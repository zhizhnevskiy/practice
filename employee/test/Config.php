<?php

namespace StandardFlow\Application\Database;

use PDO;

class Config
{
    private static $instance = [];

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}