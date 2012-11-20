#!/usr/bin/php
<?php
require 'db.php';

echo "Starting...\n";

$sql = "SELECT * FROM users";
$rs = $db->query($sql);

if ($rs) {
	while ( ($row = $rs->fetch_array()) != null ) {
		echo $row['inner_id'] . "\t" . $row['user_name'] . "\t" .
			$row['user_email'] . "\n";
	}
}

require 'close_db.php';
