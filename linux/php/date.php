<?php
$action = isset($argv[1]) ? $argv[1] : false;
$param = isset($argv[2]) ? $argv[2] : false;

echo 'Action: ' . $action . "\n";
echo 'Param: ' . $param . "\n";

if ($action == 's') {
	echo strtotime($param) . "\n";
} else if ($action == 'd') {
	echo date('Y-m-d H:i:s', $param) . "\n";
} else {
	$time = time();
	echo date('Y-m-d H:i:s', $time) . "\n";
	echo $time . "\n";
}

