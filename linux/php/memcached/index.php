<?php
require 'memcached.php';

$tobj = new stdClass;
$tobj->name = 'James Tang';
$tobj->age = 24;
$tobj->email = 'fwso@fwso.cn';

$mem->set('tobjc', $tobj, 10) or die('Failed to save data in Mem.'
	. $mem->getResultCode());

echo '<p>$tobj is save in the cache(expire in 10 seconds);</p>';

$tobjc = $mem->get('tobjc');

var_dump($tobjc);

