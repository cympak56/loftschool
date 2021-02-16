<?php

function task1($array, $return = false) {
	if ($return) {
		return "<p>".implode(", ", $array)."</p>";
	}
	
    foreach ($array as $arr) {
        echo '<p>'.$arr.'</p>';
    }
}

function task2() {
	$args = func_get_args();
	$numargs = func_num_args();
	$operation = $args[0];
	$str = [];
	
	if ($operation == '+') {
		$result = 0;
		for ($i = 1; $i < $numargs; $i++) {
			if (is_numeric($args[$i])) {
				$result += $args[$i];
				$str[] = $args[$i];
			} else {
				$error .= $args[$i].' не является числом<br>';
			}
		}
	} else if ($operation == '-') {
		$result = 0;
		for ($i = 1; $i < $numargs; $i++) {
			if (is_numeric($args[$i])) {
				$result += $args[$i];
				$str[] = $args[$i];
			} else {
				$error .= $args[$i].' не является числом<br>';
			}
		}
	} else if ($operation == '*') {
		$result = 1;
		for ($i = 1; $i < $numargs; $i++) {
			if (is_numeric($args[$i])) {
				$result *= $args[$i];
				$str[] = $args[$i];
			} else {
				$error .= $args[$i].' не является числом<br>';
			}
		}
	} else if ($operation == '/') {
		$result = 1;
		for ($i = 1; $i < $numargs; $i++) {
			if (is_numeric($args[$i]) && $args[$i] == 0) {
				$error .= $args[$i].' - делить на ноль нельзя<br>';
			} else if (is_numeric($args[$i])){
				$result /= $args[$i];
				$str[] = $args[$i];
			} else {
				$error .= $args[$i].' не является числом<br>';
			}
		}
	} else {
		echo "Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие<br>";
	}
		
	echo implode(' '.$operation.' ', $str).' = '.$result.'<br>'.$error;
}

function task3($num1, $num2) {
    if (is_numeric($num1) && is_numeric($num2)) {
        echo '<br><br><caption>Таблица умножения '.$num1.'х'.$num2.'</caprion><table cellspacing="2" border="1" cellpadding="5">';
		for ($i = 1; $i <= $num1; $i++) {
			echo "<tr>";			
			for ($j = 1; $j <= $num2; $j++) {
				echo '<td align="center">'.$i.' х '.$j.' = '.$i*$j.'</td>';
			}			
			echo "</tr>";
		}
		echo "</table>";
    } else {
        echo '<br>Оба числа должны быть целыми';
    }
}

function task4() {	
	echo '<br>'.date('d.m.Y H:m').'<br>';
}

function task5() {
	echo '<br>'.strtotime('24.02.2016 00:00:00').'<br>';
}

function task6() {
	$str = 'Карл у Клары украл Кораллы';
	echo '<br>'.str_replace('К', '', $str).'<br>';
}

function task7() {
	$str = 'Две бутылки лимонада';
	echo '<br>'.str_replace('Две', 'Три', $str).'<br>';	
}

function task8() {
	$fp = fopen('test.txt', 'w');
	fputs($fp, "Hello again!\n");
	fclose($fp);
}

function task9($fileName) {
	if(file_exists($fileName)){
		$str = '';
		$fp = fopen($fileName, 'r');
		while (!feof($fp)) {
			$str .= fgets($fp, 1024);
		}
		fclose($fp);
		
		echo '<br>'.$str;
	}else{
		echo 'файла с таким именем не существует - '.$fileName;
	}
}

function task10() {

}