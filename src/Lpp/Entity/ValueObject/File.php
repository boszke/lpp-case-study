<?php

namespace Lpp\Entity\ValueObject;

abstract class File
{
    /**
     * @var string
     */
    private $directoryPath;

    /**
     * @param string $directoryPath
     */
    public function __construct($directoryPath)
    {
        $this->directoryPath = $directoryPath;
    }

    /**
     * @return mixed
     */
    public function getDirectoryPath()
    {
        return $this->directoryPath;
    }
}