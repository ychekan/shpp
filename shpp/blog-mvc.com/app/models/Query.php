<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 21.09.2016
 * Time: 21:10
 */

namespace app\models;

use app\models\Database;


class Query extends Database
{
    /**
     * The name of the table that connects
     */
    protected $tabname;

    /**
     * @param $tabelname - input name of the table that connect
     * @throws Exception
     */
    public function __construct($tabelname)
    {
        parent::connectToDb();
        $this->tabname = $tabelname;
    }

    /**
     * Getting information on by $id
     * @param $id - input id
     * @return - result associative array or message error
     */
    public function getSelectById($id)
    {
        $query = "Select * from $this->tabname where id='$id'";
        /** @noinspection PhpDeprecationInspection */
        if ($sql = mysql_query($query))
            /** @noinspection PhpDeprecationInspection */
            return mysql_fetch_assoc($sql);
        else
            echo "Error, not select by $id";
    }

    /**
     * Last N article
     * @param int $last - count last article
     * @return array $data
     */
    public function selectLastArticle($last)
    {
        $result = [];
        $query = "Select * from $this->tabname order by id desc limit $last";
        /** @noinspection PhpDeprecationInspection */
        if ($sql = mysql_query($query))
            for ($i = 0; $i < mysql_num_rows($sql); ++$i)
                /** @noinspection PhpDeprecationInspection */
                $result[$i] = mysql_fetch_assoc($sql);
        else
            /** @noinspection PhpUnreachableStatementInspection */
            echo "Error, not select by id last article!";
        return $result;
    }


    /**
     * @param $doc
     */
    public function getSelectDoc($doc)
    {
        $query = "Select * from $this->tabname where doc=$doc";
        /** @noinspection PhpDeprecationInspection */
        if ($sql = mysql_query($query))
            /** @noinspection PhpDeprecationInspection */
            return mysql_fetch_assoc($sql);
        else
            die("Error, not output you query !");
    }
}