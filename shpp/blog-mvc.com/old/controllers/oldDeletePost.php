<?php
namespace core\controllers;
/**
* 
*/
use core\models\Delete;

class DeletePost extends Delete
{
	function __construct($tabname)
	{
		parent::__construct($tabname);
	}

	public function delArticle($id) 
	{
		parent::delDataById($id);
		return "delete";
	}
}
?>