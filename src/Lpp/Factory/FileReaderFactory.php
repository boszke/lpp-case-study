<?php

namespace Lpp\Factory;

use Lpp\Entity\ValueObject\File;
use Lpp\Entity\ValueObject\JsonFile;
use Lpp\Service\FileReaderInterface;
use Lpp\Service\JsonFileReader;

class FileReaderFactory
{
    /**
     * @param File $file
     * @return FileReaderInterface
     * @throws \Exception
     */
    public static function getFileReaderInstance(File $file)
    {
        switch (true) {
            case $file instanceof JsonFile:
                return new JsonFileReader($file);
        }

        throw new \Exception('Not supported file extension.');
    }
}