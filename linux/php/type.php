<?php
/**
 * Closures and type hinting demo
 */

/**
 * string is a valid PHP identifier
 */
class string {
	
	private $str = NULL;

	public function __construct($str) {
		$this->str = $str;
	}

	public function __toString() {
		return $this->str;
	}

	public function hello() {
		$func = function () {
			//$this is only avaiable since 5.4.0
			return 'Hello, world, anonymous function#' . $this->str;
		};
		return $func();
	}
}


function test(string $v) {
	echo $v . "\n";
}

function callback($str, $call) {
	return $call($str);
}

$str = new string('fwsous@gmail.com');

echo $str->hello() . "\n";

test($str);



$str = 'James Tang';

$prefix = 'Hello, ';

$str = callback($str, function ($str) use ($prefix) {
	return $prefix . $str;
});

echo $str . "\n";

