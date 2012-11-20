<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$post = $posts->findOne(array('title' => 'Hello, mongoDB'));

//$inc modifier
$posts->update(array('_id'=> $post['_id']), array(
	'$inc' => array('views'=>1)
));
	
$post2 = $posts->findOne(array('_id' => $post['_id']));
echo 'Views: ' . $post2['views'] . "\n";

//$set modifier
$posts->update(array('_id'=> $post['_id']), array(
	'$set' => array('views'=>0)
));
$post2 = $posts->findOne(array('_id' => $post['_id']));
echo 'Views: ' . $post2['views'] . "\n";

//$push adds an element to the end of an array 
//if the specified key already exists and
//creates a new array if it does not. 
$posts->update(array('_id'=> $post['_id']), array(
	'$push' => array('tags'=>'php')
));
$posts->update(array('_id'=> $post['_id']), array(
	'$push' => array('tags'=>'mongodb')
));

$post2 = $posts->findOne(array('_id' => $post['_id']));
var_dump($post2);

