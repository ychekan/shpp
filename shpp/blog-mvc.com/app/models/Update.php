<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 18.09.2016
 * Time: 23:55
 */
namespace app\models;

use app\models\Database;

class Update extends Database
{
	private $tabname;
	private $data;

	function __construct($tablename, $data)
	{
		parent::connectToDb();
		$this->tabname = $tablename;
		$this->data = $data;
	}

	public function setUpdate($id) {
		$query = "UPDATE $this->tabname SET";
		unset($this->data['update']);
		foreach ($this->data as $key => $value)
		{
			$query .= " `" . $key . "`='" . $value . "',";
		}
		$query = substr($query, 0, count($query) - 2) . " WHERE `id`=$id";
		if ($sql = mysql_query($query));
		
		else 
			echo "Not update this article";
	}
}
?>