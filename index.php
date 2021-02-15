<?php

require_once "bootstrap.php";
use StoreChain\Entity\Shops\CornerShop;
use StoreChain\Entity\Shops\Pharmacy;
use StoreChain\Entity\Shops\Supermarket;
use StoreChain\Entity\Products\Cigarettes;
use StoreChain\Entity\Products\Drink;
use StoreChain\Entity\Products\Food;
use StoreChain\Entity\Products\Medicine;
use StoreChain\Entity\Products\ParkingTickets;
use StoreChain\Entity\Bill;
use StoreChain\Entity\Person\Customer;

echo "<h1>Store Chain</h1>";

//Create products
$prodCigarettes1 = new Cigarettes('Drina', 100, 10);
$prodCigarettes2 = new Cigarettes('Marllboro', 200, 1);
$prodDrink1 = new Drink('Coca Cola 0.5l', 50, 5);
$prodDrink2 = new Drink('Coca Cola 2l', 150, 5);
$prodFood1 = new Food('Pizza Cut', 120, 3);
$prodMedicine1 = new Medicine('Vitamin C', 125, 100);
$prodParking1 = new ParkingTickets('Parking Zone 1', 50, 100);

//Create a test which consists of a shop of each type, with minimum two products in it.
$shopCorner1 = new CornerShop('Corner1');
$shopCorner1->addProducts($prodCigarettes1);
$shopCorner1->addProducts($prodDrink1);

$shopPharmacy1 = new Pharmacy('Pharmacy 1');
$shopPharmacy1->addProducts($prodMedicine1);
$shopPharmacy1->addProducts($prodDrink1);

$shopSupermarket1 = new Supermarket('Super 1');
$shopSupermarket1->addProducts($prodCigarettes1);
$shopSupermarket1->addProducts($prodCigarettes2);
$shopSupermarket1->addProducts($prodDrink1);
$shopSupermarket1->addProducts($prodDrink2);
$shopSupermarket1->addProducts($prodParking1);

//For each of the stores You should create two bills on the current day.
$customer1 = new Customer('Mad', 'Duck', '123-456');
$billCorner1 = new Bill($customer1, $shopCorner1);
try {
    $billCorner1->addProductToBill($shopCorner1->getProducts()[0], 2);
    $billCorner1->printBill();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

//With the amount greater than the product’s available quantity
$billCorner1 = new Bill($customer1, $shopCorner1);
try {
    $billCorner1->addProductToBill($shopCorner1->getProducts()[0], 9);
    $billCorner1->printBill();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$billPharmacy1 = new Bill($customer1, $shopPharmacy1);
try {
    $billPharmacy1->addProductToBill($shopPharmacy1->getProducts()[0], 9);
    $billPharmacy1->printBill();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$billSuper = new Bill($customer1, $shopSupermarket1);
try {
    $billSuper->addProductToBill($shopSupermarket1->getProducts()[1], 1);
    $billSuper->printBill();
} catch (Exception $exception) {
    echo $exception->getMessage();
}



