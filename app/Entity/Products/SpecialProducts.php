<?php

namespace StoreChain\Entity\Products;

interface SpecialProducts
{
    public function getSerialNumber(): int;
    public function setSerialNumber(int $serialNumber): void;

}