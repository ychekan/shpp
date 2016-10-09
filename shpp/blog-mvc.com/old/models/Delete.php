<?php
namespace core\models;

/**
 *  Delete article
 */

class Delete extends Database
{
    private $tabname;
    private $id;

    public function __construct($tablename)
    {
        parent::connectToDb();
        $this->tabname = $tablename;
        $this->id = $_GET['id'];
        self::delDataById();
    }

    /**
    * Delete article by id
    */
    function delDataById()
    {
        $query = "DELETE FROM `$this->tabname` WHERE id=$this->id";
        /** @noinspection PhpDeprecationInspection */
        if ($sql = mysql_query($query))
            echo "<script type='text/javascript'>window.location.href='./'</script>";

        

    }
}
?>