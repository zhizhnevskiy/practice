<?php

namespace StandardFlow\Application\Database;
use PDO;

class DataBase
{
    public $serverName = '127.0.0.1';
    public $userName = 'admin';
    public $password = 'phpmyadmin';
    public $dbname = 'company_employees';

    public $connection;

    public $error;

    public function connection()
    {
        try {
            $connection = new PDO("mysql:host=$this->serverName;
            dbname=$this->dbname", $this->userName, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $this->error = 'Error: ' . $e->getMessage() . '<br>';
        }
        return $this->connection = $connection;
    }
}