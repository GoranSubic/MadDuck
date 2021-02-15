<?php

namespace StoreChain\Entity\Products;

use StoreChain\Entity\Products\Product;

class Medicine extends Product implements SpecialProducts
{
    private int $serialNumber = 0;

    public function __construct(string $name, int $price, int $quantity)
    {
        parent::__construct($name, $price, $quantity);
        $this->type = 'medicine';
        $this->serialNumber++;
    }

    /**
     * @return string
     */
    public function getSerialNumber(): int
    {
        return $this->serialNumber;
    }

    /**
     * @param string $serialNumber
     */
    public function setSerialNumber(int $serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }

}