<?php

namespace StoreChain\Entity\Shops;

use StoreChain\Entity\Products\Product;

abstract class Shop
{
    protected string $name;
    protected string $type;
    protected array $products = array();

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function getName(): string;
    abstract public function setName(string $name);

    abstract public function getType(): string;
    abstract public function setType(string $type);

    abstract public function getProducts(): array;
    abstract public function addProducts(Product $product);

}