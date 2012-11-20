<?php
require 'config.php';
require 'class/mysql.class.php';
/*
function __autoload ($class_name) {
	require WEB_PATH_DIR . 'class/' . strtolower($class_name) . 
		'.class.php';
}*/

$mysql = new MySQL(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

require 'session_handler.php';

$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];

