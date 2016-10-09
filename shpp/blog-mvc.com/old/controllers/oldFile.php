<?php
/**
* 
*/
class File //extends AnotherClass
{
	private $uploaddir = "./upload";
	private $name;

	function __construct($_FILES)
	{
		$this->name = $_FILES['uri']['name'];
	}

	public function uploadImg() {
		print_r($_FILES['uri']['tmp_name']);
		@!move_uploaded_file($_FILES['uri']['tmp_name'], "$this->uploaddir/$this->name");
		return "$this->uploaddir/$this->name";
	}
}
?>