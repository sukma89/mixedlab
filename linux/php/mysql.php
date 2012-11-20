<?php

$db = mysql_connect('localhost', 'james', '123456');

if (!$db) {
	die(mysql_error());
}

echo 'Connected.<br />';
mysql_close($db);
