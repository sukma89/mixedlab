<?php
$obj = new stdClass;
$obj->name = 'PHP Server';
$obj->email = 'phps@fwso.cn';

apc_add('objc', $obj);

echo 'objc is cached.<br />';

$tobj = apc_fetch('objc');
var_dump($tobj);
