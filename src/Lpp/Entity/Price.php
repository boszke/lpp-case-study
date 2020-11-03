<?php

namespace Lpp\Entity;

/**
 * Represents a single price from a search result
 * related to a single item.
 * 
 */
class Price
{
    /**
     * Description text for the price
     * 
     * @var string
     */
    private $description;

    /**
     * Price in euro
     * 
     * @var int
     */
    private $priceInEuro;

    /**
     * Warehouse's arrival date (to)
     *
     * @var \DateTime
     */
    private $arrivalDate;

    /**
     * Due to date,
     * defining how long will the item be available for sale (i.e. in a collection)
     *
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @param string $description
     * @param int $priceInEuro
     * @param \DateTime $arrivalDate
     * @param \DateTime $dueDate
     */
    public function __construct($description, $priceInEuro, \DateTime $arrivalDate, \DateTime $dueDate)
    {
        $this->description = $description;
        $this->priceInEuro = $priceInEuro;
        $this->arrivalDate = $arrivalDate;
        $this->dueDate = $dueDate;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPriceInEuro()
    {
        return $this->priceInEuro;
    }

    /**
     * @return \DateTime
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }
}
