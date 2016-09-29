<?php
namespace core\models;
/**
* 
*/

class Access extends Select
{
	
	public function __construct(argument)
	{
		parent::__construct('users');
	}

	public function accessUser($hash)
	{

	}
}

?>