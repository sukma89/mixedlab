<?php
require_once 'Hello.php';

$h2 = new Hello();

$h2->setName('Here Name');
$h2->setID(999);

echo $h2->toString();