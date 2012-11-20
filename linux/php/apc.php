<?php
$stats = apc_cache_info();

echo '<pre>';
var_dump($stats);
echo '</pre>';
