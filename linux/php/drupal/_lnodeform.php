<?php
include_once './includes/bootstrap.inc';
require("modules/node/node.pages.inc");
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
//module_load_include('inc', 'node', 'node.pages');

// Initialize new node:
$type = 'global_discussion';
$form_id = $type .'_node_form';
$node = array('uid' => $user->uid, 'name' => $user->name, 'type' => $type);
$form_state = array();

$form = drupal_retrieve_form($type .'_node_form', $form_state, $node);
drupal_prepare_form($type .'_node_form', $form, $form_state);

var_dump($form);
echo drupal_render($form);
//echo drupal_get_form($type .'_node_form');

