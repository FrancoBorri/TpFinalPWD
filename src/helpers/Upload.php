<?php
declare(strict_types=1);

namespace App\helpers;

use Nyholm\Psr7\ServerRequest as Request;
use Psr\Http\Message\UploadedFileInterface;


class Upload
{
    static public function save(Request $request, string $directory): string
    {
        $directory = $directory . DIRECTORY_SEPARATOR;
        $uploadedFile = $request->getUploadedFiles()['file'];
        $file = $uploadedFile['file'];
        $fileName = $request->getParsedBody()['username'] . rand(0, 20000);
        if ($file->getError() !== UPLOAD_ERR_OK) {
            $fileName = self::moveUploadedFile($directory, $file, $fileName);
        }
        return $fileName;
    }

    static private function moveUploadedFile($directory, UploadedFileInterface $uploadedFile, $filename): string
    {
        # Get file extension jpg png
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $filename = sprintf('%s.%0.8s', $filename, $extension);
        #Delete if exists
        if (file_exists($directory . DIRECTORY_SEPARATOR . $filename)) {
            unlink($directory . DIRECTORY_SEPARATOR . $filename);
        }
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
        return $filename;
    }
}