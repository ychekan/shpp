<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 07.10.2016
 * Time: 0:35
 */

namespace core;

use core\Database;
use PDO;

class Query
{
    public $rows;
    private $table = null;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
        $this->table = $this->pdo->getConfig()['database']['table'];
    }

    /**
     * Main method for insert ups in DB
     * @param $str - input string with ups number.
     * @return bool true or false, if input string unique then true.
     */
    public function main($str)
    {
        $sql = "INSERT INTO $this->table (ups) VALUES ($str)";
        $rs = $this->pdo->query($sql);
        return (is_object($rs)) ? true : false;
    }

}