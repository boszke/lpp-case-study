<?php

namespace Lpp\Service;

use Lpp\Entity\ValueObject\File;
use RuntimeException;

final class JsonFileReader implements FileReaderInterface
{
    /**
     * @var File
     */
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * @param string $fileName
     * @return array
     * @throws RuntimeException
     */
    public function getData($fileName)
    {
        $filePath = $this->file->getDirectoryPath() . DIRECTORY_SEPARATOR . $fileName . '.json';
        if (false === file_exists($filePath)) {
            throw new RuntimeException("File {$this->file->getDirectoryPath()} doesn't exists");
        }

        $jsonData = file_get_contents($filePath);
        if (false === $jsonData) {
            throw new RuntimeException('Error file reading');
        }

        $jsonDecodedData = json_decode($jsonData, true);

        if (!$jsonDecodedData || json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Error decoding data from the file');
        }

        return $jsonDecodedData;
    }
}