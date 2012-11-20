<?php
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
module_load_include('inc', 'node', 'node.pages');

header('Content-Type: application/json');
//session_start();
//$_POST = $_SESSION;
$data = array();
$data['user'] = $user;
$data['post'] = $_POST;
echo json_encode($data);

