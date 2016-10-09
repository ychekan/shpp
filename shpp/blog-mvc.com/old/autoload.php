<?php
spl_autoload_register(function ($nameClass) {
    $dir = __DIR__ . '/' . __NAMESPACE__ . '/' . str_replace('\\', '/', $nameClass) . '.php';
    if (file_exists($dir))
        /** @noinspection PhpIncludeInspection */
        require_once $dir;
});
