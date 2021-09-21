<?php

spl_autoload_register(function (string $className) {
    $path = strtr($className, [
            PSR4_PREFIX => SRC_DIR,
            '\\' => DIRECTORY_SEPARATOR,
        ]) . '.php';
    require $path;
});