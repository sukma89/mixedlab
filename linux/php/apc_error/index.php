<?php
require 'common.php';

foreach ($_GET as $key=>$value) {
	$_SESSION[$key] = $value;
}


echo '<p>Session ID: ' . session_id() . '</p>';

echo '<h2>Session Key & Values</h2>';

var_dump($_SESSION);

$query = $mysql->query('SELECT * FROM ' . SESSION_TABLE);

if ($query) {
	echo '<h2>All Session in Database</h2>';
	while ( ($row = $mysql->fetch_array($query)) ) {
		var_dump($row);
	}
}

//Call this function to avoid the problem.
session_write_close();

