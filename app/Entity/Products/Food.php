<?php

namespace StoreChain\Entity\Products;

use StoreChain\Entity\Products\Product;

class Food extends Product
{
    public function __construct(string $name, int $price, int $quantity)
    {
        parent::__construct($name, $price, $quantity);
        $this->type = 'food';
    }

}