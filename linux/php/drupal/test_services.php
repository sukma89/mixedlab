<?php
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
//module_load_include('inc', 'node', 'node.pages');

$methods = services_get_all();

//var_dump($methods);
foreach ($methods as $m) {
	echo $m['method'] . "<br />\n";
}
