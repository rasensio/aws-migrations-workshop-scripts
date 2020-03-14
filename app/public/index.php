<?php
declare(strict_types=1);

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

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
/*
 * End of middleware
 */

/*
 * API resources
 */
$app->get('/greetings', function (Request $request, Response $response, array $args): Response {
    $messages = $this->get('repo')->getMessages();
    $response->getBody()->write(json_encode($messages, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/greetings', function (Request $request, Response $response, array $args): Response {
    $body = $request->getParsedBody();
    $this->get('repo')->insertMessage($body->full_name, $body->message);
    $response->getBody()->write(json_encode(['status' => 'ok'], JSON_PRETTY_PRINT));
    return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
});
/*
 * End of API resources
 */

$app->run();
