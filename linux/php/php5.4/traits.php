<?php
class Base {
	public function sayHello() {
		echo 'Hello ';
	}
}

trait SayWorld {
	public function sayHello() {
		parent::sayHello();
		echo "World!\n";
		echo 'ID:' . $this->id . "\n";
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

/*will output:
Hello World!
ID:123456
 */
