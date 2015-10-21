<?php

use Silex\WebTestCase;

class HelloWorldTest extends WebTestCase
{

	public function createApplication()
	{
	        $app =require __DIR__.'/../app/app.php';
                $app['debug'] = true; 
                return $app;    
 
	}

	public function testHelloSample()
	{
                $client = $this->createClient();
                $crawler = $client->request('GET', '/');

                $this->assertTrue($client->getResponse()->isOk());
                $this->assertCount(1, $crawler->filter('h1:contains("Hello World")')); 
 
	}

	public function testHelloToto()
	{
                $client = $this->createClient();
                $crawler = $client->request('GET', '/hello/toto');
		$this->assertCount(1, $crawler->filter('h1:contains("Hello toto")'));

	}
}
