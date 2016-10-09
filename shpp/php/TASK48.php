<?php
/**
Проверьте, что переданное число является степенью другого числа. 
Например, 4 - вторая степень двойки, 9 - вторая степень тройки,
16 - одновременно степень и двойки (4-тая) и четверки (вторая).

Ваш скрипт должен работать с любыми целыми числами.

Первую степень числа не считаем, как и нулевую:)

Целые степени (положительные), целые основания, 
скрипт должен возвращать основание степени и ее показатель, на не только true false.

Скрипт должен возвращать все возможные варианты (массив), например,
16 - одновременно степень и двойки (4-тая) и четверки (вторая).

*/

class TASK48 {
	function checkPow($basisNumber) {
		if ($basisNumber > 0 && is_int($basisNumber)) {
			for ($i = 0; $i < $basisNumber; ++$i) 
				for ($j = 0; $j < $basisNumber; ++$j) 
					if (pow($i, $j) == $basisNumber)
						$res .= " $i ^ $j = $basisNumber <br / >";
			return $res;	
		}
		else 
			return "Sorry, something is wrong!";
	}
}


$obj = new TASK48();
print_r($obj -> checkPow(1000)) ;
?>