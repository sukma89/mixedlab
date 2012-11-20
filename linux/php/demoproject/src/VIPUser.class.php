<?php
/**
 * Souce file for class
 * @package jclasses
 * @filesource
 */

/**
 * The VIP User class
 * @version 1.0
 * @package demo
 * @copyright (C) 2011 James Tang.
 */
class VIPUser extends User {

	private $level;

	/**
	 * Constructor for vip user
	 * @param string $name, user name
	 * @param integer $id user id
	 * @param integer $level vip level
	 * @see User::__construct()
	 */
	public function __construct($name, $id, $level) {
		parent::__construct($name, $id);
		$this->level = $level;
	}

	/**
	 * Fetch the user vip level
	 * @return integer the vip level
	 */
	public function  getLevel () {
		return $this->level;
	}

}
