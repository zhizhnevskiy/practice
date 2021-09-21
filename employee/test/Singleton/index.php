<?php
require 'SingletonDB.php';

$db1 = \StandardFlow\Application\Singleton\SingletonDB::getInstance();
$db2 = \StandardFlow\Application\Singleton\SingletonDB::getInstance();

var_dump($db1);
var_dump($db2);
var_dump($db1 == $db2);

$conn = \StandardFlow\Application\Singleton\SingletonDB::getInstance()->getConnection();

var_dump($conn);