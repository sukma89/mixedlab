<?php
$src = "Ha Ha, and Ha ha, You are great great.";
preg_match_all('/((?i)[a-z]+)\s+\1/', $src, $matches);
var_dump($matches);

