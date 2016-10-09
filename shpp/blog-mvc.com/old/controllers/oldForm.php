<?php
 namespace core\controllers;
/**
* The add array $_POST in DB
*/
use core\models\Insert;

class Form extends Insert
{
	private $post; // Array input data
	private $data; // Array for add in db
	
	public function __construct($post)
	{
		$this->post = $post;
	}

    /*
    * The method for add artidle in db
    **/
	public function getArrayInPost()
	{
		unset($this->post['get']); // Delete submit is name="get"
		foreach ($this->post as $key => $value) {
			$data[$key] = htmlspecialchars($value);
		}
		parent::__construct('Article', $data);
		parent::setDataToDb();
	}

	/*
	* Get comment
	**/
	public function getArrayInComment()
	{
		unset($this->post['sabmit']); // Delete submit is name="submit"
		foreach ($this->post as $key => $value) {
			$data[$key] = htmlspecialchars($value);
		}
		parent::__construct('Commit', $data);
		parent::setDataToDb();
	}

	
}
?>