<?php

function & return_refer() {
	global $a;
	return $a;
}

$a = 'Hello';
$b =& return_refer();
$b = 'World';
echo '$a = ' . $a . "\n";

function &return_refer_l() {
	$c = 'Hello, world';
	return $c;
}

$d =& return_refer_l();
echo '$d = ' . $d . "\n";

