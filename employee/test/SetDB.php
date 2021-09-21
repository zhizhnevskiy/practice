<?php

namespace StandardFlow\Application\Database;
use PDO;

class SetDB
{
    public function setDB()
    {
        if ($this->ok) {
            $stmt = $this->connection->prepare("INSERT INTO employees (firstName, lastName, birth, salary) 
VALUES (:firstName, :lastName, :birth, :salary)");

            $stmt->bindParam(':firstName', $this->firstName);
            $stmt->bindParam(':lastName', $this->lastName);
            $stmt->bindParam(':birth', $this->birth);
            $stmt->bindParam(':salary', $this->salary);

            return $stmt->execute();
        }
    }
}