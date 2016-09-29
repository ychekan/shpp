<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . "/" . __NAMESPACE__ . "/$class.php";
    if (file_exists($file))
        /** @noinspection PhpIncludeInspection */
        require_once $file;
});
