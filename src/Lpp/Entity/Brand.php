<?php

namespace Lpp\Entity;

/**
 * Represents a single brand in the result.
 *
 */
class Brand
{
    /**
     * Name of the brand
     *
     * @var string
     */
    private $brand;

    /**
     * Brand's description
     * 
     * @var string
     */
    private $description;

    /**
     * Unsorted list of items with their corresponding prices.
     * 
     * @var Item[]
     */
    private $items = [];

    /**
     * Brand constructor.
     * @param string $brand
     * @param string $description
     * @param Item ...$items
     */
    public function __construct($brand, $description, Item ...$items)
    {
        $this->brand = $brand;
        $this->description = $description;
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }
}
