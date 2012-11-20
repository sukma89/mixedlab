<?php
class Base {
	public function sayHello() {
		echo 'Hello ';
	}
}

trait SayWorld {
	public function sayHello() {
		parent::sayHello();
		echo 'World!';
		echo '<h1>ID:' . $this->id . '</h1>';
	}
}

class MyHelloWorld extends Base {
	private $id;

	public function __construct() {
		$this->id = 123456;
	}

	use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

