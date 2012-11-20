<?php

class TestMagic {

	public function __call($name, $args) {
		echo 'Calling unimplemented method: ' . $name;
		var_dump($args);
	}

	public static function __callStatic($name, $args) {
		echo '<br >Calling unimplemented method: ' . $name;
		var_dump($args);
	}
}

$tm = new Testmagic();
$tm->hello('Hello', 'you');

TestMagic::ok(1, 2, 'you');
