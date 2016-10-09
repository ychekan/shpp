<?php
namespace core\controllers;

/**
* Class to avoid re-fill forms
*/

class InputForm
{
	public $post;

	function __conctruct($inp)
	{
		$this->post = $inp;
	}

	public function input($name)
	{
		if (isset($this->post[$name]))
		{
			return $this->post[$name];
		}
		else
			return $name;
	}
}
?>