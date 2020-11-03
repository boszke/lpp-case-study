<?php

namespace Lpp\Service;

use Lpp\Entity\ValueObject\File;

interface FileReaderInterface
{

    public function __construct(File $file);

    /**
     * @param string $fileName
     * @return array
     * @throws \RuntimeException
     */
    public function getData($fileName);
}