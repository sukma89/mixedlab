<?php
/**
 * MySQL wrapper class
 * @author James Tang <james@fwso.cn>
 * @version 1.0
 * @package apc_error
 * @subpackage classes
 * @copyright (C) 2010 James Tang.
 */

/**
 * Definition of MySQL class
 * 
 * @version 1.0
 * @author James Tang <james@fwso.cn>
 */
class MySQL {

	private $conn;

	public $sql = '';
	public $result = null;
	public $database = ''; 

	function __construct ($mysql_host, $mysql_user, $mysql_pass, 
		$mysql_db, $charset='utf8') {

			$this->conn = @mysql_connect($mysql_host, $mysql_user, 
				$mysql_pass) or die("Could not connect to database");

			if ($this->conn) {
				$this->database = $mysql_db;
				$this->select_db($this->database);
			}

			@mysql_query("SET NAMES '$charset'", $this->conn);
		}

	function select_db ($db) {
		return mysql_select_db($db);
	}

	function query ($sql) {
		$this->sql = $sql;
		$this->result = mysql_query($this->sql, $this->conn);
		return $this->result;
	}

	function num_rows ($result) {
		$this->result = $result;
		return mysql_num_rows($this->result);
	}

	function fetch_row ($result) {
		$this->result = $result;
		return @mysql_fetch_row($this->result);
	}

	function fetch_assoc ($result) {
		$this->result = $result;
		return @mysql_fetch_assoc($this->result);
	}

	function fetch_array ($result, $type=MYSQL_ASSOC) {
		$this->result = $result;
		return @mysql_fetch_array($this->result, $type);
	}

	function fetch_object ($result) {
		$this->result = $result;
		return @mysql_fetch_object($this->result);
	}

	function free_result ($result) {
		$this->result = $result;
		return @mysql_free_result($this->result);
	}

	function affected_rows () {
		return @mysql_affected_rows($this->conn);
	}

	function data_seek ($result) {
		$this->result = $result;
		return mysql_data_seek($this->result, 0);
	}

	function insert_id () {
		return @mysql_insert_id($this->conn);
	}

	function close () {
		if ($this->conn) {
			@mysql_close($this->conn);
		}
	}

	function result ($result, $row=0, $field = 0) {
		return mysql_result($result, $row, $field);
	}

	function errno () {
		return mysql_errno();
	}

	function error () {
		return mysql_error();
	}

}
