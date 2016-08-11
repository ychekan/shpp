/*
Дан массив $accesses = array(
'user', 'moderator', 'admin', 'superadmin'
);.
Дана переменная $var в которой хранится значение вида:
moderator+, moderator-.

Если там лежит moderator+ - на выходе должен быть массив 'moderator', 'admin', 'superadmin'.
Если там лежит moderator- - на выходе должен быть массив 'user', 'moderator'.

Вместо moderator может быть любой элемент массива.
**/
<?php
class TASK60 {
	const PLUS = "moderator+";
	const MINUS = "moderator-";
	$var = PLUS;
	function divideArr($var) {
		$arr = array('user', 'moderator', 'admin', 'superadmin');
		for ($i = 0; $i < count($arr); ++$i) {
			array_push($res, $arr[i]);
			if (substr($var, 0, len($var)) == $arr[i]){
				return (substr($var, -1) == "+") ?  $arr : $res;
			}
			unset($arr[i]);
		}
	}
}
?> 