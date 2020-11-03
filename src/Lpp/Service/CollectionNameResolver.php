<?php

namespace Lpp\Service;

use InvalidArgumentException;

class CollectionNameResolver
{
    /**
     * @var array
     */
    private $collectionIdsKeyedByCollectionName;

    public function __construct(array $collectionIdsKeyedByCollectionName)
    {
        $this->collectionIdsKeyedByCollectionName = $collectionIdsKeyedByCollectionName;
    }

    /**
     * @param string $collectionName
     * @return int
     */
    public function getCollectionId($collectionName)
    {
        if (!isset($this->collectionIdsKeyedByCollectionName[$collectionName])) {
            throw new InvalidArgumentException("Collection $collectionName doesn't exists");
        }

        return $this->collectionIdsKeyedByCollectionName[$collectionName];
    }
}