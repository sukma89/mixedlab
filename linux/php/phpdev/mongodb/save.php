<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$post = $posts->findOne(array('title' => 'Hello, mongoDB'));
$_id = $post['_id'];

echo $post['title'] . "\n";

if ($post) {

	$post['title'] = 'Hello, mongoDB 2';
	$posts->update(array('_id'=> $_id), $post, array(
		'upsert' => true		
	));
	//$posts->save($post);

	$post['title'] = 'Hello, mongoDB x2';
	unset($post['_id']);
	$posts->update(array('title'=> $post['title']), $post, array(
		'upsert' => true		
	));
	//$posts->save($post);
		
	$post2 = $posts->findOne(array('_id' => $_id));
	echo $post2['title'] . "\n";

	$post3 = $posts->findOne(array(
		'title' => 'Hello, mongoDB x2'
	));
	echo $post3['title'] . "\n";
}

