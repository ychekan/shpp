<?php
/*
Сделайте страницу в интернете, которую может поредактировать любой желающий (без авторизации) и сохранить (и все увидят изменения).

Выкладывайте здесь исходный код и ссылку на эту страницу в интернете (кто не умеет делать страницы на хостинге - напишите мне, я помогу).
*/

class TASK41 {
	
	function task() {
		$filename = "test/index.html";
		if (isset($filename)) {
			$file = file_get_contents($filename);
			foreach ($file as $key => $value) {
				echo " === {$key} " . htmlspecialchars($value) . " END ";
			}
			return null;
		}
	} 
}
?>