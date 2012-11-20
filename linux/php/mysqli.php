<?php
$db = new mysqli('localhost', 'root', '123456', 'test');
if ($db->connect_error) {
	die('Connect Error: ' . $db->connect_error . '[' . $db->connect_errno . ']');
}

echo 'Connected.<br />';

$sql = "INSERT INTO users VALUES (NULL, 'peter', 'peter@fwso.cn')";

$db->query($sql);

if ($db->insert_id > 0) {
	echo 'Inserted : '. $db->insert_id . '<br />';
} else {
	echo 'Failed.<br />';
}

$sql = "SELECT * FROM users";

$rs = $db->query($sql);

while ( ($row = $rs->fetch_array()) ) {
	var_dump($row);
	echo '<hr/>';
}

$db->close();


