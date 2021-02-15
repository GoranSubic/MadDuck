<?php

namespace StoreChain\Entity;

use StoreChain\Entity\Person\Customer;
use StoreChain\Entity\Products\Product;
use StoreChain\Entity\Shops\Shop;
use StoreChain\Entity\Logger;
use Exception;

class Bill
{
    private int $id;
    private int $billId = 0;
    private string $date;
    private int $year = 2000;
    private Customer $customer;
    private Shop $shop;
    private array $products = array();

    public function __construct(Customer $customer, Shop $shop)
    {
        $this->customer = $customer;
        $this->shop = $shop;
        $this->date = date('d/m/Y');
        $this->setBillId();
    }

    private function setBillId()
    {
        $checkYear = (int)date('Y');
        if ($checkYear > $this->year) {
            $this->year = (int)date('Y');
            $this->billId = 1;
        } else {
            $this->billId++;
        }

    }

    /**
     * @return int
     */
    public function getBillId(): int
    {
        return $this->billId;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
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
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function addProductToBill(Product $product, int $billQty)
    {
        $key = array_search($product, $this->shop->getProducts());
        if ($key !== true) {
            $prodQty = $product->getQuantity();
            if ($prodQty > 0 && $prodQty >= $billQty) {
                $product->qtyBefore = $prodQty;
                $product->setQuantity($prodQty - $billQty);
                $this->products[] = $product;
            } else {
                throw new \Exception('<br />Purchase is not allowed, not enough product quantity!');
            }
        } else {
            throw new \Exception('<br />Product is not on this store stock!');
        }
    }

    public function printBill()
    {
        if (count($this->getProducts()) > 0) {
            foreach ($this->getProducts() as $prod)
            $msg = $this->shop->getType();
            $msg .= ' - ';
            $msg .= $prod->getType();
            $msg .= ' - ';
            $msg .= $prod->getPrice();
            $msg .= ' - ';
            $msg .= $prod->qtyBefore;
            $msg .= ' - ';
            $msg .= $prod->getQuantity();
            Logger::getLogger()->writeLog($msg);
            echo "<br />".$msg;
        } else {
            throw new \Exception('No products added to bill!');
        }
    }

}