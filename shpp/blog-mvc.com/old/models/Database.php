<?php
namespace core\models;

class Database extends Config {
    
    function connectToDb() {
        try {
            if(mysql_connect($this->host, $this->user, $this->password))
                if (mysql_select_db($this->dbuser)); 
        }
        catch (ErrorException $e) {
            throw new Exception("Not connect to DB ", 0, $e);        
        }
    }  

    function cloceConnection() {
        return mysql_close();
    }
}
?>