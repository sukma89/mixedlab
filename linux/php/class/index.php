<?php
ini_set('display_errors', 'Off');
function _error_handler ($errno, $errstr) {
	echo '<p>Error: '. $errno . ':' . $errstr . '</p>';
}

set_error_handler(_error_handler);

class User {
	public function getName() {
		return $this->name;
	}
}

$obj = new StdClass;
$obj->name = 'James Tang';
$obj->email = 'james@fwso.cn';

$user = new User;

//这里将会出现Undefined Notice
echo 'Name: ' . $user->getName();

$user->name = 'Peter Chen';
$user->email = 'peter@fwso.cn';

echo 'Name: ' . $user->getName();

$arr = array('China', 'America', 'Australia');
$arr = (Object) $arr;

$arr2 = array('country'=>'China', 'City'=>'Guangzhou');
$arr2 = (Object) $arr2;

$url = 'http://fwso.cn/';
$url = (Object) $url;

$age = 23;
$age = (Object) $age;

var_dump($arr, $arr2, $url, $age);
echo '<hr />';
var_dump($obj, $user, $arr, $arr2);

