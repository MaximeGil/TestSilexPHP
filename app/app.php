<?php

require_once __DIR__.'/bootstrap.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('hello.twig.html', array('name' => 'World'));
});

$app->get('/hello/', function () use ($app) {
        return $app['twig']->render('hello.twig.html', array('name' => 'You'));
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.twig.html', array('name' => $name));
});


$app->get('/api/hello', function () use ($app) {
	return json_encode(array('first' => 'Hello', 'second' => 'World)); 
});

return $app;
