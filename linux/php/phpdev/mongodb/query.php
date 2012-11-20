<?php
$mongo = new Mongo("localhost:27017");
$blog = $mongo->blog;
$posts = $blog->posts;

$cursor = $posts->find(array(
	'title' => new MongoRegex('/mongoDB/i'),
),array(
	'_id'=>false,
	'title',
	'date'
));

$cursor->sort(array(
	'title' => -1, //1-ascending, -1 descending	
));

$cursor->limit(3);

foreach ($cursor as $post) {
	//echo $post['_id'] . "\n"; //$post['_id'] is object of MongoId.
	echo $post['title'] . "\n"; 
	echo date('Y-m-d', $post['date']->sec) . "\n"; 
	echo "=========\n";
}
