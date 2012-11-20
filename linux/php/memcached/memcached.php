<?php
$mem = new Memcached;
$mem->addServer('192.168.0.78', 11211);

echo 'Result Code: ' . $mem->getResultCode() . "<br />\n";

$version = $mem->getVersion();

foreach ($version as $s=>$v) {
	echo '<p>Memcached [' . $s . '] Version: ' . $v . '</p>';
}
