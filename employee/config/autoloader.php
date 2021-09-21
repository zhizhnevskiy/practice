<?php

define('PSR4_PREFIX', 'Employee');
define('PROJECT_DIR', dirname(__DIR__));
define('SRC_DIR', PROJECT_DIR . DIRECTORY_SEPARATOR . 'src');

spl_autoload_register(function (string $className) {

    $path = strtr($className, [
            PSR4_PREFIX => SRC_DIR,
            '\\' => DIRECTORY_SEPARATOR,
        ]) . '.php';

    require $path;
});