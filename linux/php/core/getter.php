<?php
class Example {
	private $p1;
	private $p2;

	public function __construct($p1) {
		$this->p1 = $p1;
	}

	public function __get($name) {
		echo "Call __get()\n";
		return $this->$name;
	}

	public function __isset($name) {
		return isset($this->$name);
	}

	public function __unset($name) {
		unset($this->$name);
	}
}

$ex = new Example('Hello');
unset($ex->p1);
echo $ex->p1 . "\n";
