<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$cursor = $posts->find();

foreach ($cursor as $post) {
	echo $post['_id'] . "\n"; //$post['_id'] is object of MongoId.
	echo $post['title'] . "\n"; 
	echo "=========\n";
}

//remove documents matching query conditions
$posts->remove(array(
	'title' => 'Hello, mongoDB'	
));

$cursor = $posts->find();

if ($cursor->hasNext()) {
	foreach ($cursor as $post) {
		echo $post['_id'] . "\n"; //$post['_id'] is object of MongoId.
		echo $post['title'] . "\n"; 
		echo "=====2====\n";
	}
}

//Remove all, drop() is more effient than remove()
//$cursor = $posts->remove();
$cursor = $posts->drop();

$cursor = $posts->find();

if ($cursor->hasNext()) {
	foreach ($cursor as $post) {
		echo $post['_id'] . "\n"; //$post['_id'] is object of MongoId.
		echo $post['title'] . "\n"; 
		echo "=========\n";
	}
} else {
	echo 'Has no documents.' . "\n";
}

