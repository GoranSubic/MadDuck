<?php

namespace StoreChain\Entity\Shops;

use StoreChain\Entity\Products\Product;
use StoreChain\Entity\Shops\Shop;

class CornerShop extends Shop
{
    private int $id;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->type = 'CornerShop';
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function addProducts(Product $product): void
    {
        if ($product->getType() == 'medicine') {
//            throw new \Exception('<br />Medicine can be sold only by pharmacies');
            echo "<br />Can't add product, Medicine can be sold only by pharmacies!";
        } else $this->products[] = $product;
    }

}