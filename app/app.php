<?php


$app->get('/', function() {
	return ('Hello World');
});

$app->get('/hello/{name}', function ($name) use ($app) {
	return ('Hello ' . $app->escape($name)); 
});

$app->get('/hello', function () {
	return ('Hello World');
});

 return $app; 

?>
