<?php
require_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

echo 'User name: ' . $GLOBALS['user']->name . '(uid: ' . $GLOBALS['user']->uid . ")<br />\n";
?>
