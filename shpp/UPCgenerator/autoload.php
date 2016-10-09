<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 22.08.2016
 * Time: 21:23
 */
spl_autoload_register(function ($name)
{
    $dir = __DIR__. "/" . __NAMESPACE__ . str_replace("\\", "/", $name) .".php";
    if (file_exists($dir))
        /** @noinspection PhpIncludeInspection */
        include $dir;
});