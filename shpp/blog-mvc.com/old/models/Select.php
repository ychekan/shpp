<?php
namespace core\models;

/**
 * Class for select info by id
 */


class Select extends Database
{
    private $tabname; // Name table

    function __construct($tabelname)
    {
        parent::connectToDb();
        $this->tabname = $tabelname;
    }

    


//------------------------------
    /*
    * Get info by id
    **/
    public function getRecordById($id)
    {
        $query = "Select * from $this->tabname where id='$id'";
        if ($sql = mysql_query($query))
            return mysql_fetch_array($sql);
        else
            echo "Error, not select by $id";
    }

    /*
    * Get all by id
    **/
    public function getAllById()
    {
        $query = "Select * from $this->tabname";
        if ($sql = mysql_query($query))
            for ($i = 0; $i < mysql_num_rows($sql); ++$i)
                $data[$i] = mysql_fetch_array($sql);
        return $data;
    }

    /*
    * Get mail by id
    **/
    public function getMailById($id)
    {
        $query = "Select mail from $this->tabname where id='$id'";
        if ($sql = mysql_query($query))
            return mysql_fetch_array($sql);
        else
            echo "Error, not select by $id";
    }

    /*
    * Get login by id 
    **/
    public function getLoginById($id)
    {
        $query = "Select login from $this->tabname where id='$id'";
        if ($sql = mysql_query($query))
            return mysql_fetch_array($sql);
        else
            echo "Error, not select by $id";
    }

    /*
    * Get url from image by id
    **/
    public function getImgById($id)
    {
        $query = "Select img_url from $this->tabname where id='$id'";
        if ($sql = mysql_query($query))
            return mysql_fetch_array($sql);
        else
            echo "Error, not select by $id";
    }

    /*
    * For get parameter by in key
    **/
    public function getDataWithParameter($parameter)
    {
        $query = "Select * from $this->tabname where";
        foreach ($parameter as $key => $value)
            $query .= "`$key` = '$value' AND ";
        $query = substr($query, 0, -4);
        if ($sql = mysql_query($query))
            for ($i = 0; $i < mysql_num_rows($sql); ++$i)
                $data[$i] = mysql_fetch_array($sql);
        return $data;
    }

    /*
    * Output limited article
    **/
    public function getDataByIdLimit($lim)
    {
        $query = "Select * from $this->tabname order by id desc limit $lim";
        if ($sql = mysql_query($query))
            for ($i = 0; $i < mysql_num_rows($sql); ++$i)
                $data[$i] = mysql_fetch_array($sql);
        else
            echo "Error not limitet";
        return $data;
    }

    /*
    * Get count comments by id article
    **/
    public function getCoutComment($id)
    {
        //SELECT count(*) FROM `Commit` where id_article=60
        $query = "Select count(*) from `$this->tabname` where id_article=$id";
        if ($sql_count = mysql_query($query))
            return mysql_fetch_array($sql_count);
    }

    /*
    *  Get data by id_article
    **/
    public function getDataByComment($id)
    {
        $query = "Select * from $this->tabname where id_article=$id"; //id_article=$id ";
        if ($sql = mysql_query($query))
            for ($i = 0; $i < mysql_num_rows($sql); ++$i)
                $data[$i] = mysql_fetch_array($sql);
        else
            echo "Error not limitet";
        return $data;
    }

    /*
    * The get data by e-mail
    **/
    public function getDataByEmail($e_mail)
    {
        $query = "Select * from `$this->tabname` where e-mail=$e_mail";
        if ($sql = mysql_query($query))
            return mysql_fetch_array($sql);
        return null;
    }
}

?>