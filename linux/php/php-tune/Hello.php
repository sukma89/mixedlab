<?php

class Hello {

	private $name;
	private $id;

	public function __construct() {
		$this->id = 0;
		$this->name = 'Default';
	}
	
	public function getName () {
		return $this->name;
	}
	
	public function getID () {
		return $this->id;
	}
	
	public function setID ($id) {
		$this->id = $id;
	}
	
	public function setName ($name) {
		$this->name = $name;
	}
	
	public function toString () {
		return $this->id . '#' . $this->name . "\n";
	}
}