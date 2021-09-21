<?php


require_once "connectionDB.php";

$stmt = $connection->query('SELECT * FROM employees');
$data = $stmt->fetchAll();