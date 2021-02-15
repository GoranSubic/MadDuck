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
$cornerShop1 = new CornerShop('Corner1');
$cornerShop1->addProducts($prodCigarettes1);