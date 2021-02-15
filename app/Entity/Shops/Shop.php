<?php

namespace StoreChain\Entity\Shops;

use StoreChain\Entity\Products\Product;
use StoreChain\Entity\Reports;

abstract class Shop
{
    protected string $name;
    protected string $type;
    protected array $products = array();
    protected array $reports = array();

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

    public function addToReport(Product $product)
    {
        $report = new Reports();
        $report->setProduct($product);
        $report->setStoreType($this->type);
        $this->reports[] = $report;
    }

    public function reportSoldProducts($from, $to)
    {
        $count = 0;
        echo "<br />Report sold products for ". $this->type. ":";
        foreach ($this->reports as $report) {
            if ($report->getStoreType() === $this->type) {
                if ($report->getDateSold() <= $to) { // && $report->getDateSold() >= $from) {
                    $count++;
                    echo '<br />'. $count .') '. $report->getProduct()->getName() . '<br />';
                }
            }
        }
    }
}