<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 18.09.2016
 * Time: 23:32
 */

namespace app\models;


class Database
{
    public function __construct()
    {
        //debug(self::getConnectParameter());// for debug
    }

    /**
     * Parse file config.ini for use parameter in connect
     */
    protected static function getConnectParameter()
    {
        return parse_ini_file(__DIR__ . "/../../config.ini", true);
    }

    /**
     * The connect of DB
     */
    protected static function connectToDb()
    {
        try {
            //$config = self::getConnectParameter();
            if (mysql_connect(self::getConnectParameter()['database']['host'],
                self::getConnectParameter()['database']['user'],
                self::getConnectParameter()['database']['password']))
                if (mysql_select_db(self::getConnectParameter()['database']['name'])) ;
        } catch (ErrorException $e) {
            throw new Exception("Not connect to DB ", 0, $e);

        }
    }

    /**
     * For destroy connecting in DB
     */
    protected function cloceConnection()
    {
        return mysql_close();
    }


}

?>