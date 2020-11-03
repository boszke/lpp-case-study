<?php

namespace Lpp\Service;

use Lpp\Entity\Brand;
use Lpp\Entity\Item;
use Lpp\Entity\Price;
use Lpp\Entity\ValueObject\Url;
use UnexpectedValueException;

class ItemService implements ItemServiceInterface
{
    /**
     * @var FileReaderInterface
     */
    private $fileReader;

    public function __construct(FileReaderInterface $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    /**
     * @param int $collectionId
     * @return array|\Lpp\Entity\Brand[]
     * @throws \Lpp\Exceptions\ValidationException
     */
    public function getResultForCollectionId($collectionId)
    {
        $fileData = $this->fileReader->getData($collectionId);
        if (empty($fileData['brands'])) {
            throw new UnexpectedValueException('Brands not found.');
        }

        return $this->mapBrands($fileData['brands']);
    }

    /**
     * @param array $brands
     * @return Brand[]
     * @throws \Lpp\Exceptions\ValidationException
     */
    private function mapBrands(array $brands)
    {
        return array_map(function($brand) {;
            $items = $this->mapItems($brand['items']);

            return new Brand($brand['name'], $brand['description'], ...$items);
        }, $brands);
    }

    /**
     * @param array $items
     * @return Item[]
     * @throws \Lpp\Exceptions\ValidationException
     */
    private function mapItems(array $items)
    {
        return array_map(function($item) {
            $prices = $this->mapPrices($item['prices']);

            return new Item($item['name'], new Url($item['url']), ...$prices);
        }, $items);
    }

    private function mapPrices(array $prices)
    {
        return array_map(function ($price) {
            return new Price(
                $price['description'],
                $price['priceInEuro'],
                new \DateTime($price['arrival']),
                new \DateTime($price['due'])
            );
        }, $prices);
    }
}