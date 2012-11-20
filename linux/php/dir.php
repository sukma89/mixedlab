<?php
echo __DIR__;

$dir = dirname(__FILE__);
$files = scandir($dir, SCANDIR_SORT_DESCENDING);

var_dump($files);


