<?php

require_once __DIR__.'/../vendor/silex.phar';

$app = new Silex\Application();

$app['autoloader']->registerNamespace('Silextest', __DIR__.'/../src');


?>
