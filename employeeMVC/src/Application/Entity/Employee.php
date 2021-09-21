<?php

namespace StandardFlow\Application\Entity;

//DTO

class Employee
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $birth;
    private int $salary;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Employee
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): Employee
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): Employee
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getBirth(): string
    {
        return $this->birth;
    }

    public function setBirth(string $birth): Employee
    {
        $this->birth = $birth;
        return $this;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): Employee
    {
        $this->salary = $salary;
        return $this;
    }
}