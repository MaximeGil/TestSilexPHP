<?php

require_once __DIR__ . '/bootstrap.php';

use KPhoen\Provider\NegotiationServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Negotiation\Stack\Negotiation;

$app = new Silex\Application();
$app->register(new NegotiationServiceProvider());

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/../views'));

$app
        ->get('/', 'TestSilexPhp\Controller\HelloController::getHelloWorld');

$app
        ->get('/hello/', 'TestSilexPhp\Controller\HelloController::getHelloYou');

$app
        ->get('/hello/{name}', 'TestSilexPhp\Controller\HelloController::getHelloName');

$app
        ->get('/api/hello', 'TestSilexPhp\Controller\ApiController::getHelloWorld');


$app
        ->get('/api/hello/', 'TestSilexPhp\Controller\ApiController::getHelloYou');


$app
        ->get('/api/hello/{name}', 'TestSilexPhp\Controller\ApiController::getHelloWordName');



return $app = new Negotiation($app, null, null, null, ['format_priorities' => ['html', 'json']]);
