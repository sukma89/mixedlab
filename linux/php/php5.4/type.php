<?php

function hello(String $name, array $params) {
	echo $name . "\n";
	var_dump($params);
}

$name = 10;
$params = "PHP 5.4 beta 2";

//hello($name, $params);

$name = 'James Tang';
$params = array(
	'email' => 'james@fwso.cn',
	'version' => '2.4.10',	
);

hello($name, $params);

