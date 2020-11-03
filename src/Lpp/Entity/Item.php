<?php

namespace Lpp\Entity;

use Lpp\Entity\ValueObject\Url;

/**
 * Represents a single item from a search result.
 * 
 */
class Item
{
    /**
     * Name of the item
     *
     * @var string
     */
    private $name;

    /**
     * Url of the item's page
     * 
     * @var string
     */
    private $url;

    /**
     * Unsorted list of prices received from the 
     * actual search query.
     * 
     * @var Price[]
     */
    private $prices = [];

    /**
     * @param string $name
     * @param Url $url
     * @param Price ...$prices
     */
    public function __construct($name, Url $url, Price ...$prices)
    {
        $this->name = $name;
        $this->url = $url;
        $this->prices = $prices;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Price[]
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
