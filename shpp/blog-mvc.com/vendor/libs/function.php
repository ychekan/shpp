<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 17.09.2016
 * Time: 20:48
 */


/**
 * For debug (test)
 */
function debug($arr)
{
    echo "<pre>" . print_r($arr, true) . "</pre>";
}


/**
 * For debug class on exists
 */
function class_isset($class)
{
    if (class_exists($class))
        echo "<br><pre>Class $class exists!</pre><br>";
    else
        echo "<br><pre>Class $class not found!</pre><br>";
}

/**
 * For debug method on exists
 * @param $method
 * @param $class
 */
function method_isset($method, $class)
{
    if (method_exists($method, $class))
        echo "<br><pre>Method $method exists in $class!</pre><br>";
    else
        echo "<br><pre>Method $method not found in $class!</pre><br>";
}

/**
 * For the test controller is connected to which class involved
 */
function debug_name()
{
    echo "This class name = " . get_class() . " !<br />";
}