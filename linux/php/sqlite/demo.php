<?php
$dbfile = __DIR__ . DIRECTORY_SEPARATOR . 'demo.sqlite';
$db = new SQLiteDatabase($dbfile, 0666, $error);

if ($error) {
	die($error);
}

if (!$db->query("CREATE TABLE urls(hash VARCHAR(64) NOT NULL, url VARCHAR(500) NOT NULL, PRIMARY KEY(hash))")) {
	echo "Failed to create table urls.\n";
}

if (!$db->query("INSERT INTO urls VALUES ('1', 'http://fwso.cn')")) {
	echo 'Failed to insert data.' . "\n"; 
}

$db->query("INSERT INTO urls VALUES ('2', 'http://www.google.com')");

$sql = "SELECT * FROM urls LIMIT 10";
$result = $db->query($sql);

if ($result) {
	$rows = $result->fetchAll(SQLITE_ASSOC);
	var_dump($rows);
}

echo "Done.\n";

