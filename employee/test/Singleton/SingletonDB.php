<?php

namespace StandardFlow\Application\Singleton;

use PDO;

class SingletonDB
{
    private static $instance = [];
    private $connection;

    private static $serverName = '127.0.0.1';
    private static $userName = 'admin';
    private static $password = 'phpmyadmin';
    private static $dbname = 'company_employees';

    private function __construct()
    {
        $this->connection = new PDO("mysql:host=" . self::$serverName .
            ';dbname=' . self::$dbname,
            self::$userName,
            self::$password,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    private function __clone()
    {
        throw new Exception('Feature disabled.');
    }

    public function __wakeup()
    {
        throw new Exception('Feature disabled.');
    }
}