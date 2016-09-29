<?php
namespace core\models;

/**
 * Class for insert info
 */


class Insert extends Database
{
    private $tabName; // Name table for insert data
    private $data;

    function __construct($tableName, array $data)
    {
        $this->tabName = $tableName;
        $this->data = $data;
        parent::connectToDb();
    }

    /**
     * Set data in DB
     */
    function setDataToDb()
    {
        $query = "INSERT INTO $this->tabName";
        foreach ($this->data as $key => $value) {
            $keys[] = $key; // set array keys
            $values[] = $value; // set array value
        }
        $query .= "(`" . implode($keys, "`,`") . "`) VALUES ";
        $query .= "('" . implode($values, "','") . "')";
        /** @noinspection PhpDeprecationInspection */
        if ($sql = mysql_query($query)) ;
    }
}
?>