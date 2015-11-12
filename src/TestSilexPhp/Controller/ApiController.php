<?php

namespace TestSilexPhp\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController
{
    public function getHelloWorld(Request $request, Application $app)
    {
        $format = $request->attributes->get('_format');

        switch ($format) {
                case 'html':
                return new Response('<h1>Hello World</h1>');
                    case 'json':
                return new JsonResponse(array('first' => 'Hello', 'second' => 'World'));
                }
    }

    public function getHelloYou(Request $request, Application $app)
    {
        $format = $request->attributes->get('_format');
        switch ($format) {
            case 'html':
         return new Response('<h1>Hello You</h1>');
            case 'json':
         return new JsonResponse(array('first' => 'Hello', 'second' => 'You'));
            }
    }

   public function getHelloWorldName(Request $request, Application $app, $name)
	{

	 $format = $request->attributes->get('_format');

        switch ($format) {
        case 'html':
        return new Response('<h1>Hello '.$name.'</h1>');

        case 'json':
        return new JsonResponse(array('first' => 'Hello', 'second' => $name));
        }


	}

}
