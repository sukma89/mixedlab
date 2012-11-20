<?php
require 'common.php';

$user = new User;
$user->name = 'James Tang';
$user->email = 'fwso@fwso.cn';

var_dump($user);

$mysql = new MySQL(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

$sql = <<<SQL
CREATE TABLE  IF NOT EXISTS `sessions`(
	`key` VARCHAR(32) NOT NULL PRIMARY KEY,
	`data` TEXT,
	`expire` INT(10) NOT NULL DEFAULT 0
);
SQL;

$mysql->Query($sql);

$sql = "INSERT INTO " . SESSION_TABLE . 
	" VALUES ('hello', 'world', '" . time() . "')";

$mysql->Query($sql);

$query = $mysql->Query('SELECT * FROM ' . SESSION_TABLE);

if ($query) {
	while ( ($row = $mysql->FetchArray($query)) ) {
		var_dump($row);
	}
}
