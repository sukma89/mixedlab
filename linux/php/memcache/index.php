<?php
$mem = new Memcache;
$mem->connect('localhost', 11211) or die('Failed to connect to memcached');

echo '<p>Memcached Version: ' . $mem->getVersion() . '</p>';

$tobj = new stdClass;
$tobj->str_attr = 'test';
$tobj->int_attr = 1234;

$mem->set('tobjc', $tobj, false, 10) or die('Failed to save data in Mem.');

echo '<p>$tobj is save in the cache(expire in 10 seconds);</p>';

$tobjc = $mem->get('tobjc');

var_dump($tobjc);

