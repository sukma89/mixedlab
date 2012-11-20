<?php

$str = "Hello, world";

echo $str, '# jmodule_strlen: ' . jmodule_strlen($str) . "<br />\n";
echo $str, '# jstrlen: ' . jstrlen($str) . "<br />\n";

function php_array_range() {
	$arr = array();
	for ($i = 0; $i < 1000; $i++) {
		$arr[] = $i;
	}
	return $arr;
}

php_array_range();

if (function_exists('jmodule_array_range')) {
	echo 'Run: jmodule_array_range().<br />';
	jmodule_array_range();
}

echo '<hr />';

function &php_reference_a() {
	if (!isset($GLOBALS['a'])) {
		$GLOBALS['a'] = NULL;
	}
	return $GLOBALS['a'];
}

$a = 'Hello';
$b =& php_reference_a();
$b = 'World';

echo '$a = ' . $a . '<br />';
echo '$b = ' . $b . '<br />';
echo 'Reference count of $a = ' . jmodule_refcount($a) . '<br />';
$e = &$a;
echo 'Reference count of $a = ' . jmodule_refcount($a) . '<br />';
$x = '10';
echo 'Reference count of $x = ' . jmodule_refcount($x) . '<br />';

