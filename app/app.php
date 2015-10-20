<?php

require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/', function() {
	return ('Hello World');
});

$app->get('/hello/{name}', function ($name) use ($app) {
	return ('Hello ' . $app->escape($name)); 
});


 return $app; 

?>
