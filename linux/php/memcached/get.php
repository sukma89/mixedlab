<?php
require 'memcached.php';

'<h1>Geting tobj from memcached.</h1>';

$tobjc = $mem->get('tobjc');

var_dump($tobjc);

$stats = $mem->getStats();

var_dump($stats);

