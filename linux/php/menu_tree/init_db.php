<?php

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if ($db->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if (!$db->query('SET NAMES UTF8')) {
	echo 'Failed to set charset to utf-8<br />';
} 

