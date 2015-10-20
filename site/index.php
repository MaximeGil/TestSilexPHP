<?php
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Array(array(
    'index' => 'Hello World !',
));
$twig = new Twig_Environment($loader);

echo $twig->render('index');
?>
