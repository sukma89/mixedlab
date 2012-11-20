<?php
// include drupal's node include file
include_once './includes/bootstrap.inc';
require("modules/node/node.pages.inc");
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// create an empty $form_state array
$form_state = array();

// define the content type of the form you'd like to load
$nodeType = 'global_discussion';

// create a string of the $form_id
$form_id = $nodeType . '_node_form';

// create a basic $node array
$node = array('type' => $nodeType, 'uid' => $GLOBALS['user']->uid, 'name' => $GLOBALS['user']->uid);

// load the $form
$form = drupal_retrieve_form($form_id, $form_state, $node);
drupal_prepare_form($form_id, $form, $form_state);

//var_dump($form);
echo drupal_render($form);
