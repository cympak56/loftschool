<?php
header('Content-type: text/html; charset=utf-8');

function task1() {
	$users = [];
	$names = ['Маша', 'Витя', 'Игорь', 'Вадим', 'Таня'];
	
	for ($i = 1; $i <= 50; $i++) {
		$users[$i]['id'] = $i;
		$users[$i]['name'] = $names[rand(0, 4)];
		$users[$i]['age'] = rand(18, 45);
	}
	
	file_put_contents('../users.json', json_encode($users));
}

function task2() {
	$users = json_decode(file_get_contents('../users.json'), true);
	$dublicateNames = array_count_values(array_column($users, 'name'));
	
	foreach ($dublicateNames as $key => $value) {
		echo "Пользователей с именем ".$key." - ".$value."<br>";
	}
}

function task3() {
	$users = json_decode(file_get_contents('../users.json'), true);
	$ages = array_column($users, 'age');
	
	echo "<br>Средний возраст пользователей - ".round(array_sum($ages) / count($ages))."<br>";
}