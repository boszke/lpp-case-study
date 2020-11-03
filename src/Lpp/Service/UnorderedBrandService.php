<?php

namespace Lpp\Service;

class UnorderedBrandService extends BrandService
{
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

        return array_merge([], ...$items);
    }
}
