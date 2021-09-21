<?php

namespace StandardFlow\Application\Repository;

use PDO;
use StandardFlow\Application;
use StandardFlow\Application\Entity\Employee;

class EmployeeRepository
{
    private PDO $connection;

    public array $cache = [];

    public function __construct()
    {
        $this->connection = Application::getInstance()->getConnection();
    }

    public function getById(int $id): ?Employee
    {
        if (!empty($this->cache[$id])) {
            return $this->cache[$id];
        }

        $stmt = $this->connection->query("SELECT * FROM employees WHERE id={$id}");
        $all = $stmt->fetchAll();

        if (empty($all)) {
            return null;
        }

        $row = $all[0];

        $employee = new Employee();

        $employee
            ->setId($row['id'])
            ->setFirstName($row['firstName'])
            ->setLastName($row['lastName'])
            ->setBirth($row['birth'])
            ->setSalary($row['salary']);

        $this->cache[$employee->getId()] = $employee;

        return $employee;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $stmt = $this->connection->query('SELECT * FROM employees');
        $all = $stmt->fetchAll();

        if (empty($all)) {
            return [];
        }

        $out = [];

        foreach ($all as $row) {
            $employee = new Employee();

            $out[] = $employee
                ->setId($row['id'])
                ->setFirstName($row['firstName'])
                ->setLastName($row['lastName'])
                ->setBirth($row['birth'])
                ->setSalary($row['salary']);

            $this->cache[$employee->getId()] = $employee;
        }
        return $out;
    }

    public function createEmployee(Employee $employee): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO employees (firstName, lastName, birth, salary) 
VALUES (:firstName, :lastName, :birth, :salary)");

        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birth = $employee->getBirth();
        $salary = $employee->getSalary();

        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':salary', $salary);
        $stmt->execute();

        return true;
    }
}