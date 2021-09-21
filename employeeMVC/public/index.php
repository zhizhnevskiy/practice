<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('PROJECT_DIR', dirname(__DIR__));
define('SRC_DIR', PROJECT_DIR . DIRECTORY_SEPARATOR . 'src');
define('PSR4_PREFIX', 'StandardFlow');

require_once PROJECT_DIR . '/config/autoloader.php';
//require_once implode(DIRECTORY_SEPARATOR, [PROJECT_DIR, 'config', 'autoloader.php']);

$config = require_once PROJECT_DIR . '/config/config.php';

$application = new \StandardFlow\Application($config);

$response = $application->handle($_SERVER["REQUEST_URI"]);

echo $response;