<?php
namespace cn\fwso\php;

class User {

	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	public function info() {
		return __NAMESPACE__ . '\\' .  __CLASS__ . '#name:' . $this->name;
	}
}

