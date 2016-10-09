<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 17.09.2016
 * Time: 15:10
 */

namespace vendor\core;


class Router
{
    const NAME_SPACE_CONTROLLER = "\\app\\controllers\\";

    /**
     * Array for save all route (Table of routes.)
     */
    protected static $routes = [];

    protected static $route = [];

    public function __construct()
    {
        $url_query = rtrim($_SERVER['QUERY_STRING'], "/");
        /**
         * Rule for view page
         */
        self::add("^/?$", ['controller' => "Main", "action" => "index"]);
        self::add("^about/?$", ['controller' => "Main", "action" => "about"]);
        self::add("^posts/?$", ['controller' => "Posts", "action" => "all"]);
        self::add("^posts-new/?$", ['controller' => "PostsNew", "action" => "new"]);

        self::add("^login/?$", ['controller' => "Users", "action" => "login"]);
        self::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
        self::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
        self::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)/?(?P<id>[0-9]+)?$');
        self::dispatch($url_query);
    }

    /**
     * Add table routes.
     * @param $regexp - input regexp
     * @param array $route
     */
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    /**
     * The method for inputted $route
     * @param $url - input url
     * @return bool - result
     */
    protected static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key))
                        $route[$key] = $value;
                }
                if (!isset($route['action']))
                    $route['action'] = 'index';
                if (!isset($route['id']))
                    $route['id'] = null;
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /**
     * Redirects URL on a particular route
     * @param $url - input url
     * @return void
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {
            $controller = self::NAME_SPACE_CONTROLLER . self::upperCamelCase(self::$route['controller']);
            if (class_exists($controller)) {
                $cObject = new $controller;
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($cObject, $action)) {
                    $cObject->$action(self::$route['id']);
                } else {
                    echo "Method <b>$controller::$action</b> not found!";
                }
            } else {
                echo "Error class <b>$controller</b> not found";
            }
        } else {
            http_response_code(404);
            include "error/404.php"; // View page 404
        }
    }

    /**
     * The correctly convert the class name
     * @name - entrance what the name of the class
     * @return - result correctly name
     */
    protected static function upperCamelCase($name)
    {
        return str_replace(" ", "", ucwords(str_replace("-", " ", $name)));
    }

    /**
     * The correctly convert the method name
     * @name - entrance what the name of the method
     * @return - result correctly name
     */
    protected static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * For Debug
     * The test, for view all table
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * For Debug
     * The view value this route
     */
    public static function getRoute()
    {
        return self::$route;
    }
}