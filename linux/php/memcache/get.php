<?php
$mem = new Memcache;
$mem->connect('localhost', 11211) or die('Failed to connect to memcached');

echo '<p>Memcached Version: ' . $mem->getVersion() . '</p>';

'<h1>Geting tobj from memcached.</h1>';

$tobjc = $mem->get('tobjc');

var_dump($tobjc);

$stats = $mem->getStats();

var_dump($stats);

