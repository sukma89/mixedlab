<?php
//short syntax
$arr = [1,'james', 'fwso@fwso.cn'];
print_r($arr);

function get_array() {
	return array('hello', 'james', 'tang');
}

$a2 = get_array()[1];

echo $a2 . "\n";


function get_array2() {
	return [1, 'james', 'james@fwso.cn'];
}
//dereference
$a3 = get_array2()[2];

echo $a3 . "\n";

//call throught array
class Hello {
	public function say($str) {
		echo $str . "\n";
	}
}


//Not working
$func = ['Hello', 'say', 'OK'];
//working
$func = ['Hello', 'say'];
//$func();
$func('James Tang');

