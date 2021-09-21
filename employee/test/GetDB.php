<?php

namespace StandardFlow\Application\Database;
use PDO;

class GetDB
{

    public array $data =[];

    public function getDB()
    {
        $stmt = $this->connection->query('SELECT * FROM employees');
        return $this->data = $stmt->fetchAll();
    }
}