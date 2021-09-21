<?php

error_reporting(E_ALL);

define('PROJECT_DIR', dirname(__DIR__));
define('SRC_DIR', PROJECT_DIR . DIRECTORY_SEPARATOR . 'src');

require PROJECT_DIR . '/vendor/autoload.php';

$config = require_once PROJECT_DIR . '/config/config.php';

$application = new StandardFlow\Application($config);

$response = $application->handle($_SERVER["REQUEST_URI"]);

echo $response;