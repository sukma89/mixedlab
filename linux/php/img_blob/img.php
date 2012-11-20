<?php
/*
$file = 'images/phpmailer.gif';

$data = base64_encode(file_get_contents($file));
echo '<img src="data:image/gif;base64,' . $data . '" />';
*/

$db = new mysqli('localhost', 'root', '123456', 'test');

if ($db->connect_error) {
	die('Connect Error: ' . $db->connect_errno . '#' . $db->connect_error);
}

/*
if ($db->query("INSERT INTO img(`img`) VALUES('$data')")) {
	echo 'Saved.<br />' . "\n";
}
*/

$result = $db->query("SELECT `id`, `img` FROM img WHERE `id`=2");

echo '<h1>Image in DB</h1>';

if ($result && ($row = $result->fetch_assoc())) {
	echo '<img src="data:image/gif;base64,' . $row['img'] . '" />';
}

$db->close();

