<?php

spl_autoload_register(function (string $className) {

    $path = str_replace('\\', '/', $className);

    $rootDir = dirname(__DIR__, 2);
    $file = $rootDir . '/' . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }

});