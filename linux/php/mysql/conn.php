<?php
$link = mysqli_connect('localhost', 'james', '123456', 'test', 3306, '/var/lib/mysql/mysql.sock');

if (!$link) {
	    die('Connect Error (' . mysqli_connect_errno() . ') '
			            . mysqli_connect_error());
}

echo 'Success... ' . mysqli_get_host_info($link) . "\n";

mysqli_close($link);

