<?php
$dbfile = __DIR__ . DIRECTORY_SEPARATOR . 'demo.sq3';

try {
	$db = new PDO('sqlite:' . $dbfile);
	$db->exec("CREATE TABLE IF NOT EXISTS  urls (hash VARCHAR(64) NOT NULL, url VARCHAR(500) NOT NULL, PRIMARY KEY(hash))");
	//$er = $db->exec("INSERT INTO urls VALUES ('1', 'http://fwso.cn'), ('2', 'http://www.google.com')");
	$er = $db->exec("INSERT INTO urls VALUES ('1', 'http://fwso.cn')");
	echo 'Effected rows: ' . $er . "\n";
	$er = $db->exec("INSERT INTO urls VALUES ('2', 'http://www.google.com')");

	if ($db->errorCode()) {
		$error = $db->errorInfo();
		echo 'Error: ' . $error[0] . '#' . $error[1] . '#' . $error[2] . "\n";
	}

	$sql = "SELECT * FROM urls LIMIT 10";
	$result = $db->query($sql);
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	var_dump($rows);
} catch (Exception $ex) {
	echo "Failed to connect: " . $ex->getMessage() . "\n";	
}

