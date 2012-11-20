<?php
require 'Hello.php';

if (isset($_GET['to']) && strlen($_GET['to']) > 0) {
	header('Location: ' . $_GET['to']);
	exit(0);
}

$h = new Hello();

echo $h->getID() . '#' . $h->getName() . "\n";

$h->setName('James Tang');
$h->setId (10);

echo $h->getID() . '#' . $h->getName() . "\n";


