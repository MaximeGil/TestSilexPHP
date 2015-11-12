<?php

require_once __DIR__.'/bootstrap.php';

use KPhoen\Provider\NegotiationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
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

$app
    ->get('/api/hello', 'TestSilexPhp\Controller\ApiController::getHelloWorld');


$app
    ->get('/api/hello/', 'TestSilexPhp\Controller\ApiController::getHelloYou');


$app
    ->get('/api/hello/{name}', 'TestSilexPhp\Controller\ApiController::getHelloWordName');

return $app = new Negotiation($app, null, null, null,  ['format_priorities' => ['html', 'json']]);
