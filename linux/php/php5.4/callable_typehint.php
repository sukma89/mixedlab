<?php
/**
 * PHP 5.4 `callable` typehint
 */
class User {

	public static function generateId($prefix) {
		return $prefix . date('is');
	}
}


function get_id(callable $func) {
	return $func('hello');
}

echo get_id(array('User', 'generateId')) , "\n";

//Catchable fatal error: Argument 1 passed to get_id() must be callable, 
//string given,
echo get_id('ok'), "\n";


