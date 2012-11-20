#!/usr/local/bin/php
<?php

$link = mysql_connect('localhost', 'root', '123456');

if ($link) {
	if (mysql_select_db('test')) {
		echo 'MySQL Connected.' . "\n";
	}

} else {
	echo 'Cannot Connect DB: ' . mysql_error() . "\n";
}

$sql = "SELECT * FROM users";
$result = mysql_query($sql);
if ($result) {
	while ( ($row = mysql_fetch_array($result)) ) {
		echo "\n" . $row['inner_id'] . '-' . $row['user_name'] . "\n";
	}
}

mysql_close($link);
