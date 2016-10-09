<?php
/**
 * Output error message
 */
error_reporting(E_ALL);


/**
 * The include most file and created object
 */
require_once "../config.php";


define('DIR', __DIR__);

/**
 * Use router
 */
$obj = new \vendor\core\Router();