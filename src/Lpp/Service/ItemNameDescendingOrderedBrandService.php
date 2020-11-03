<?php

namespace Lpp\Service;

use Lpp\Entity\Item;

class ItemNameDescendingOrderedBrandService extends BrandService
{
    public function __construct(ItemServiceInterface $itemService, CollectionNameResolver $collectionNameResolver)
    {
        parent::__construct($itemService, $collectionNameResolver);
    }

    /**
     * @param string $collectionName
     * @return array|\Lpp\Entity\Item[]
     */
    public function getItemsForCollection($collectionName)
    {
        $brands = $this->getBrandsForCollection($collectionName);

        $items = [];
        foreach ($brands as $brand) {
            $items[] = $brand->getItems();
        }

        $items = array_merge([], ...$items);

        return $this->sort($items);
    }

    /**
     * @param array|\Lpp\Entity\Item[] $items
     * @return array|Item[]
     */
    private function sort(array $items)
    {
        usort($items, function (Item $a, Item $b) {
                return strcmp($b->getName(), $a->getName());
        });

        return $items;
    }
}
