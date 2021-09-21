<?php


$serverName = '127.0.0.1';
$userName = 'root';
$password = 'root';
$dbname = 'company_employees';

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbname", $userName, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage() . '<br>';
}