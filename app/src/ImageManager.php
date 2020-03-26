<?php
declare(strict_types=1);

namespace App;

use Psr\Http\Message\UploadedFileInterface;
use Ramsey\Uuid\Uuid;

class ImageManager
{
	const FOLDER = __DIR__ . '/../public/img/pics/';

	public function storeB64(string $b64)
	{
		$filename = Uuid::uuid4()->toString() . '.jpg';
		if (file_put_contents(self::FOLDER . $filename, base64_decode($b64)) === false) {
			throw new \RuntimeException('Failed to store image');
		}
		return $filename;
	}

	public function storeUploadedFile(UploadedFileInterface $file)
	{
		$filename = Uuid::uuid4()->toString() . '.jpg';
		$file->moveTo(self::FOLDER . $filename);
		return $filename;
	}
}
