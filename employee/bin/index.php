<?php

error_reporting(E_ALL);

require dirname(__DIR__) . '/config/config.php';
require dirname(__DIR__) . '/config/autoloader.php';

$view = new Employee\View\Plain();

//$connection = new Employee\Controller\ConnectionGet();
//$connection->connection();
//$connection->getDB();

$parameters = [
    'database' => '/config/database.php',
    'newEmployee' => '/src/newEmployee.php'
];

$view
    ->setLayout('base')
    ->setView('page');

echo $view->render($parameters);
