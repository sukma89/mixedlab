<?php

echo bson_encode(array(
	'_id' => new MongoId(),
	'title' => 'Hello, world',
	'date' => new MongoDate(),
)) . "\n";

