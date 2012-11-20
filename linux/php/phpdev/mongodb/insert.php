<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$post = array(
	'title' => 'Hello, mongoDB',
	'content' => '<h1>Hello, mongoDB</h1>',
	'author' => 'James Tang',
	'date' => new MongoDate(/*time()*/),
	'views' => 0
);

$post2 = array(
	'title' => 'Powerfull mongoDB',
	'content' => '<h1>Powerfull, mongoDB</h1>',
	'author' => 'James Tang',
	'date' => new MongoDate(/*time()*/),
	'views' => 0
);

//Insert one document
$posts->insert($post);
$posts->insert($post2);


//Batch insert
try {

	//explicitly set the _id value
	//or the batch inserting will cause exception
	//it may be a bug of batchInsert() method
	$post['_id'] = new MongoId();
	$post2['_id'] = new MongoId();

	$posts->batchInsert(array($post, $post2), array('safe'=>TRUE));
	//'safe' option indicats waiting for a database response or not. 
	//If TRUE, the program will wait for the database response and 
	//throw a MongoCursorException if the insert did not succeed.
} catch (Exception $ex) {
	echo 'Error: ' . $ex->getCode() . '#' . $ex->getMessage() . "\n";
}

echo "Done\n";


