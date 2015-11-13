<?php

namespace TestSilexPhp\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController {

    public function getHelloWorld(Application $app) {
        return $app['twig']->render('hello.twig.html', array('name' => 'World'));
    }

    public function getHelloYou(Application $app) {
        return $app['twig']->render('hello.twig.html', array('name' => 'You'));
    }

    public function getHelloName(Application $app, $name) {
        return $app['twig']->render('hello.twig.html', array('name' => $name));
    }

}
