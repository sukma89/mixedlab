<?php

$request_url = 'http://drupal6.47.lan.gz/api/user/login';

$user_data = array(
	'username' => 'admin',
	'password' => '123456',	
);

$user_data = http_build_query($user_data);

$curl = curl_init($request_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $user_data);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FAILONERROR, true);

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($http_code == 200) {
	echo 'Logged<br />';
	$logged_user = json_decode($response);
	var_dump($logged_user);
} else {
	$http_message = curl_error($curl);
	die($http_message);
}

