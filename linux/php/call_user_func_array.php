<?php
error_reporting(0);

class User {
	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
}

function hello_func(&$user) {
	echo '>>' .  gettype($user) . "\n";
	$user->setName('Hello, New Name');
}

$user = new User('Default Name');
echo $user->getName() . "\n";

//hello_func($user);
//hello_func(array($user));

call_user_func_array('hello_func', array($user));

echo $user->getName() . "\n";

