<?php
$db = new mysqli('localhost', 'root', '123456', 'test');

if ($db->connect_error) {
	die('Connect Error: ' . $db->connect_errno . '#' . $db->connect_error);
}

$result = $db->query("SELECT `id`, `img` FROM img_blob ORDER BY `id` DESC LIMIT 1");


if ($result && ($row = $result->fetch_assoc())) {
	$time = time();
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s',$time));
	header('Expires: ' . gmdate('D, d M Y H:i:s', $time + 86400));
	header('Content-Length: ' . strlen($row['img']));
	header('Content-Type: image/gif');
	echo $row['img'];
}

$db->close();

