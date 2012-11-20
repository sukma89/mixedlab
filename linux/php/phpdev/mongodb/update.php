<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$post = $posts->findOne(array('title' => 'Hello, mongoDB'));

var_dump($post);

if ($post) {
	$post['title'] = 'Hello, mongoDB 2';

	//update
	$posts->update(array('_id'=> $post['_id']), $post);
	
	$post2 = $posts->findOne(array('_id' => $post['_id']));
	var_dump($post2);
}

