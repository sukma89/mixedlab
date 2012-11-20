<?php

$v1 = 'Jmodule Test';
echo 'refcount $v1 = ' . jmodule_refcount($v1) . "\n";
$v2 = $v1;
echo 'refcount $v1 = ' . jmodule_refcount($v1) . "\n";
$v3 = $v1;
echo 'refcount $v1 = ' . jmodule_refcount($v1) . "\n";
$v3 = "New string";
echo 'refcount $v1 = ' . jmodule_refcount($v1) . "\n";
$v4 = 'Jmodule Test';
echo 'refcount $v1 = ' . jmodule_refcount($v1) . "\n";
echo 'refcount $v4 = ' . jmodule_refcount($v4) . "\n";


