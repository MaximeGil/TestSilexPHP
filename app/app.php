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

$app->get('/api/hello', function (Request $request) use ($app) {

        $format = $request->attributes->get('_format');

        switch ($format) {
        case 'html':
        return new Response('<h1>Hello World</h1>');

        case 'json':
        return new JsonResponse(array('first' => 'Hello', 'second' => 'World'));
        }

});

$app->get('/api/hello/', function (Request $request) use ($app) {

    $format = $request->attributes->get('_format');

    switch ($format) {
    case 'html':
    return new Response('<h1>Hello You</h1>');

    case 'json':
    return new JsonResponse(array('first' => 'Hello', 'second' => 'You'));
    }

});

$app->get('/api/hello/{name}', function ($name, Request $request) use ($app) {

    $format = $request->attributes->get('_format');

        switch ($format) {
        case 'html':
        return new Response('<h1>Hello '.$name.'</h1>');

        case 'json':
        return new JsonResponse(array('first' => 'Hello', 'second' => $name));
        }

});

return $app = new Negotiation($app, null, null, null,  ['format_priorities' => ['html', 'json']]);
