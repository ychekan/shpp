<?php 
namespace core\models;

/**
* Class for authorise users
*/

class Users extends Select
{
	function __construct()
	{
		parent::__construct('users');
	}

	function getUser($post)
	{
		//var_dump($post);
		if (isset($post['authorise']))
		{
			print_r(parent::getDataByEmail($post['e-mail']));
		}
			//print_r(parent::getDataByEmail($post['e-mail']));
		if (isset($post['guest']));
			///header("Location:/views/main.php");
		
	}
}
?>