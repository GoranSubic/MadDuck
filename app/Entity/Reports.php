<?php

namespace StoreChain\Entity;

use StoreChain\Entity\Products\Product;

class Reports
{
    private int $id;
    private \DateTime $dateSold;
    private Product $product;
    private string $storeType;

    public function __construct()
    {
        $this->dateSold = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getDateSold(): \DateTime
    {
        return $this->dateSold;
    }

    /**
     * @param \DateTime $dateSold
     */
    public function setDateSold(\DateTime $dateSold): void
    {
        $this->dateSold = $dateSold;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getStoreType(): string
    {
        return $this->storeType;
    }

    /**
     * @param string $storeType
     */
    public function setStoreType(string $storeType): void
    {
        $this->storeType = $storeType;
    }

}