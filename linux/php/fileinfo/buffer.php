<?php
/*
 * 中国人
 */

$str = isset($argv[1]) ? $argv[1] : 'default string';
echo 'String: ' . $str . "\n";

$finfo = new finfo(FILEINFO_MIME);

var_dump($finfo->buffer($str));

var_dump($finfo->file('buffer.php'));
var_dump($finfo->file('paris-2.jpg'));
var_dump($finfo->file('fun2.gif'));
var_dump($finfo->file('tasks.png'));

