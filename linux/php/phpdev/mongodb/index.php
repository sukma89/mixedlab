<?php
$mongo = new Mongo("localhost:27017");

$db = $mongo->blog;

$collection = $db->posts;

$post = array(
	'title' => 'Blog Post 001',
	'content' => '<h1>Hello, MongoDB</h1><p>You are great</p>',
	'author' => 'James Tang',
	'date' => date('Y-m-d H:i:s'),
);

//$collection->insert($post);

$post = array(
	'title' => 'Blog Post 002',
	'content' => '<h1>How to use mongodb</h1><p>It\'s simple.</p>',
	'author' => 'James Tang',
	'date' => date('Y-m-d H:i:s'),
);

//$collection->insert($post);

$cursor = $collection->find(array(
	'title' => 'Blog Post 002',
));

foreach ($cursor as $post) {
	echo $post['_id'] . '<br />'; //$post['_id'] is object of MongoId.
	echo $post['title'] . "<hr />";
}

