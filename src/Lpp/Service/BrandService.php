<?php

namespace Lpp\Service;

abstract class BrandService implements BrandServiceInterface
{
    /**
     * @var ItemServiceInterface
     */
    protected $itemService;

    /**
     * @var CollectionNameResolver
     */
    protected $collectionNameResolver;

    /**
     * @param ItemServiceInterface $itemService
     * @param CollectionNameResolver $collectionNameResolver
     */
    public function __construct(ItemServiceInterface $itemService, CollectionNameResolver $collectionNameResolver) {
        $this->itemService = $itemService;
        $this->collectionNameResolver = $collectionNameResolver;
    }

    /**
     * This is supposed to be used for testing purposes.
     * You should avoid replacing the item service at runtime.
     *
     * @param \Lpp\Service\ItemServiceInterface $itemService
     *
     * @return void
     */
    public function setItemService(ItemServiceInterface $itemService) {
        $this->itemService = $itemService;
    }

    /**
     * @param string $collectionName Name of the collection to search for.
     *
     * @return \Lpp\Entity\Brand[]
     */
    public function getBrandsForCollection($collectionName) {
        $collectionId = $this->collectionNameResolver->getCollectionId($collectionName);

        return $this->itemService->getResultForCollectionId($collectionId);
    }
}