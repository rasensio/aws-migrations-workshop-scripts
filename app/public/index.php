<?php
declare(strict_types=1);

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createMutable(__DIR__ . '/../');
$dotenv->load();

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

/*
 * Dependency container
 */
$container->set('repo', function () {
    $dbHost = getenv('APP_DB_HOST');
    $dbUser = getenv('APP_DB_USER');
    $dbPass = getenv('APP_DB_PASS');
    $dbName = getenv('APP_DB_NAME');
    return new \App\DbRepository($dbHost, $dbUser, $dbPass, $dbName);
});

$container->set('imageManager', function () {
    return new \App\ImageManager();
});

$container->set('view', function () {
    return Twig::create(__DIR__ . '/../views', ['cache' => false]);
});
/*
 * End of dependency container
 */

/*
 * Middleware
 */
$jsonParsingMiddleware = function (Request $request, RequestHandler $handler): Response {
    $contentType = $request->getHeaderLine('Content-Type');

    if (strstr($contentType, 'application/json')) {
        $contents = json_decode(file_get_contents('php://input'));
        if (json_last_error() === JSON_ERROR_NONE) {
            $request = $request->withParsedBody($contents);
        }
    }

    return $handler->handle($request);
};

$app->add($jsonParsingMiddleware);

$app->add(TwigMiddleware::createFromContainer($app));
/*
 * End of middleware
 */

/*
 * API resources
 */
$app->post(
    '/api/config',
    function (Request $request, Response $response, array $args) use ($dotenv): Response {
        $body = $request->getParsedBody();

        if (!isset($body->db_host) || empty($body->db_host)) {
            throw new \InvalidArgumentException('db host is required');
        }
        if (!isset($body->db_user) || empty($body->db_user)) {
            throw new \InvalidArgumentException('db user is required');
        }
        if (!isset($body->db_pass) || empty($body->db_pass)) {
            throw new \InvalidArgumentException('db pass is required');
        }
        if (!isset($body->db_name) || empty($body->db_name)) {
            throw new \InvalidArgumentException('db name is required');
        }

        $config = [
            'APP_DB_HOST' => $body->db_host,
            'APP_DB_USER' => $body->db_user,
            'APP_DB_PASS' => $body->db_pass,
            'APP_DB_NAME' => $body->db_name,
        ];
        file_put_contents(__DIR__ . '/../.env', http_build_query($config, '', "\n\r"));

        $response->getBody()->write(json_encode(['status' => 'ok'], JSON_PRETTY_PRINT));
        return $response->withHeader('Content-Type', 'application/json');
    }
);

$app->get('/api/messages', function (Request $request, Response $response, array $args): Response {
    $messages = $this->get('repo')->getMessages();
    $response->getBody()->write(json_encode($messages, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/messages', function (Request $request, Response $response, array $args): Response {
    $body = $request->getParsedBody();

    $pictureFilename = null;
    if ($body->picture !== null) {
        $pictureFilename = $this->get('imageManager')->storeB64($body->picture);
    }

    $this->get('repo')->insertMessage($body->full_name, $body->message, $pictureFilename);
    $response->getBody()->write(json_encode(['status' => 'ok'], JSON_PRETTY_PRINT));
    return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
});

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $messages = $this->get('repo')->getMessages();
    return $this->get('view')->render($response, 'home.html', [
        'messages' => $messages
    ]);
});

$app->post('/messages', function (Request $request, Response $response, array $args): Response {
    $body = $request->getParsedBody();
    $files = $request->getUploadedFiles();

    $pictureFilename = null;
    if (array_key_exists('picture', $files) && $files['picture']->getSize()) {
        $pictureFilename = $this->get('imageManager')->storeUploadedFile($files['picture']);
    }

    $this->get('repo')->insertMessage($body['full_name'], $body['message'], $pictureFilename);
    return $response->withHeader('Location', '/')->withStatus(302);
});
/*
 * End of API resources
 */

$app->run();
