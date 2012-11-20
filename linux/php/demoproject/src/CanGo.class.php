<?php
/**
 * Souce file for class
 * @package jclasses
 * @filesource
 */

/**
 * Define the something of interface
 * @author James Tang <fwso@fwso.cn>
 * @version 1.0
 * @package demo
 */
interface CanGo {
	
	/**
	 * The classes implements this interface must implements this
	 * method
	 * @param array $params parameters used to can go
	 * @return boolean done or not
	 */
	public function doGo($params);
}
