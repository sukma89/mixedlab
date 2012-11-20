<?php
/**
 * Souce file for class
 * @package jclasses
 * @filesource
 */

/**
 * This is a demo project for PHPDoc
 * @copyright (C) 2011 James Tang
 * @package demo
 * @version 1.0
 * @author James Tang <fwso@fwso.cn>
 */
class User implements CanGo{

	private $name;
	private $id;

	/**
	 * Defines the user types: male && female
	 */
	public static $USER_TYPES = array(
		'1'=>'male',
		'2'=>'female'
	);

	/**
	 * Constructor of user
	 * @param string $name The user name
	 * @param integer $id The user id
	 */
	public function __construct ($name, $id) {
		$this->name = $name;
		$this->id = $id;
	}

	/**
	 * Fetch the user name
	 * @return string the user name
	 * */
	public function getName () {
		return $this->name;
	}

	/**
	 * Set new name for the user
	 * @param string $name The new user name
	 */
	public function setName ($name) {
		$this->name = $name;
	}

	/**
	 * Implements the can go interface for user
	 * @see CanGo::doGo()
	 */
	public function doGo ($params) {
		return true;
	}

	private function  _toString() {
		//DO something.
	}

}

