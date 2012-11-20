<?php
/*
$file = 'images/phpmailer.gif';

$data = file_get_contents($file);
echo '<img src="data:image/gif;base64,' . base64_encode($data) . '" />';
 */ 

$db = new mysqli('localhost', 'root', '123456', 'test');

if ($db->connect_error) {
	die('Connect Error: ' . $db->connect_errno . '#' . $db->connect_error);
}

/*
if ($db->query("INSERT INTO img_blob(`img`) VALUES('" 
	. $db->real_escape_string($data) . "')")) {
	echo 'Saved.<br />' . "\n";
} else if ($db->error) {
	echo '<hr />Error: ' . $db->errno . '#' . $db->error . '<br />';
}
 */

$result = $db->query("SELECT `id`, `img` FROM img_blob ORDER BY `id` DESC LIMIT 1");

echo '<h1>Image in DB</h1>';

if ($result && ($row = $result->fetch_assoc())) {
	echo '<img src="data:image/gif;base64,' . base64_encode($row['img']) . '" />';
}

$db->close();

