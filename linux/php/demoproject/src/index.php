<?php

function __autoload($cname) {
	require $cname . '.class.php';
}

$vip = new VIPUser('James Tang', 1, 10);

echo 'Name: ' . $vip->getName() . '<br />';
