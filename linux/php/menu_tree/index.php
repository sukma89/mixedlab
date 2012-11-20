<?php

require_once 'config.php';
require_once 'CategoryUtil.php';
require_once 'init_db.php';

header('Content-Type: text/html;charset=utf-8');

$sql = "SELECT * FROM category";

$result = $db->query($sql);

$data = array();

if ($result) {
	while( ($row = $result->fetch_assoc() )) {
		$data[$row['id']] = $row;
	}
}

$util = new CategoryUtil($data);

include_once 'index.tpl';

