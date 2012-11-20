#!/usr/local/bin/php
<?php

$db = new mysqli('localhost', 'root', '123456', 'test');

if ($db->connect_error) {
	die ('Failed to connect DB[' . $db->connect_errno . "]". 
		$db->connect_error . "\n");
}
echo "Conencted...\n";

$db->close();
