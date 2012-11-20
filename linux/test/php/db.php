<?php
$db = new mysqli('localhost', 'root', '123456', 'test');

if ($db->connect_error) {
	die("Connect Error:[" . $db->connect_errno . "]\n" .
	       $db->connect_error . "\n");	
}

