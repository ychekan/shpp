<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 07.10.2016
 * Time: 22:54
 */

namespace core;

use \PDO;

class Database extends PDO
{
    /**
     * Construct for connect in database
     * Use parent method construct from PDO class
     */
    public function __construct()
    {
        try {
            $dsn = "mysql:dbname=" . self::getConfig()['database']['name'] . ";host=" . self::getConfig()['database']['host'];
            parent::__construct($dsn, self::getConfig()['database']['user'], self::getConfig()['database']['password']);//self::getConfig()['database']['user'], self::getConfig()['database']['password']);
        } catch (\PDOException $pdo_exp) {
            die($pdo_exp->getMessage());
        }
    }


    /**
     * Method for parsing .ini file
     * @param - input array with parameters for connect in database
     * @return - array with config
     */
    public function getConfig()
    {
        return parse_ini_file(__DIR__ . "/../php.ini", true);
    }
}