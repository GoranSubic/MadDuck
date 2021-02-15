<?php

namespace StoreChain\Entity\Person;

abstract class Person
{
    protected string $firstName;
    protected string $lastName;
    protected string $phoneNumber;

    public function __construct(string $firstName, string $lastName, string $phoneNumber)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumber = $phoneNumber;
    }

    abstract public function getFirstName(): string;
    abstract public function setFirstName(string $firstName);

    abstract public function getLastName(): string;
    abstract public function setLastName(string $lastName);

    abstract public function getPhoneNumber(): string;
    abstract public function setPhoneNumber(string $phoneNumber);

}