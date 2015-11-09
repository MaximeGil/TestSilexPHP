<?php

require_once __DIR__.'/bootstrap.php';

use KPhoen\Provider\NegotiationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Negotiation\Stack\Negotiation;

$app = new Silex\Application();
$app->register(new NegotiationServiceProvider());

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

$app->get('/api/hello', function (Request $request) use ($app) {

$app = new Negotiation($app);
$app->handle($request);
$format = $request->attributes->get('_format');

var_dump($format);
die(); 

switch($format) {
case 'html':
return $app['twig']->render('hello.twig.html', array('name' => 'World'));
break;

case 'json':
return json_encode(array('first' => 'Hello', 'second' => 'World'));
break;

}

});

$app->get('/api/hello/', function () use ($app) {
 
return json_encode(array('first' => 'Hello', 'second' => 'You'));
});

$app->get('/api/hello/{name}', function ($name) use ($app) {
    
 return json_encode(array('first' => 'Hello', 'second' => $name));


});

return $app;
