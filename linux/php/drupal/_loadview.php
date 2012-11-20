<?php
include_once './includes/bootstrap.inc';
//require("modules/node/node.pages.inc");
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$view = views_get_view('nodecomments');

$view->set_display('nodecomment_comments_1');

$view->set_arguments(array(176));
$view->is_cacheable = false;

echo $view->render('nodecomment_comments_1');
