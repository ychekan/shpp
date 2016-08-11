<?php
/*
Задача №66. Четные и нечетные номера в массиве.
Поменяйте местами четные и нечетные элементы в массиве, попарно
**/
class TASK66 {
	
	function task() {
		$arr = range(1, 14);
		for ($i = 0; $i < count($arr); ++$i) { 
			// first number unpaired
			if ($arr[$i] % 2 != 0 && $arr[0] % 2 != 0) {
				list($arr[$i + 1], $arr[$i]) = array($arr[$i], $arr[$i + 1]);
				++$i;
			}
			// first number pair
			if ($arr[$i] % 2 == 0 && $arr[0] % 2 == 0) {
				list($arr[$i], $arr[$i + 1]) = array($arr[$i + 1], $arr[$i]);
				++$i;
			}
		}
		return $arr;
	}
}
?>