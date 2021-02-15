<?php

namespace StoreChain\Entity\Products;

use StoreChain\Entity\Products\Product;

class Cigarettes extends Product
{
    public function __construct(string $name, int $price, int $quantity)
    {
        parent::__construct($name, $price, $quantity);
        $this->type = 'cigarettes';
    }

}