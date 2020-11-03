<?php

use Lpp\Entity\ValueObject\JsonFile;
use Lpp\Factory\FileReaderFactory;
use Lpp\Service\CollectionNameResolver;
use Lpp\Service\ItemNameDescendingOrderedBrandService;
use Lpp\Service\ItemService;
use Lpp\Service\UnorderedBrandService;

require_once 'vendor/autoload.php';

const COLLECTION_NAME_TO_ID_MAP = ['winter' => 1315475];

try {
    $fileReader = FileReaderFactory::getFileReaderInstance(new JsonFile('./data'));
    $itemService = new ItemService($fileReader);
    $collectionNameResolver = new CollectionNameResolver(COLLECTION_NAME_TO_ID_MAP);

    $unorderedBrand = new UnorderedBrandService($itemService, $collectionNameResolver);
    $brands = $unorderedBrand->getBrandsForCollection('winter');
    $brandsItems = $unorderedBrand->getItemsForCollection('winter');

    $itemNameOrderedBrandService = new ItemNameDescendingOrderedBrandService($itemService, $collectionNameResolver);
    $orderedBrandsItems = $itemNameOrderedBrandService->getItemsForCollection('winter');
} catch (Exception $e) {
    exit($e->getMessage());
}

print_r($orderedBrandsItems);