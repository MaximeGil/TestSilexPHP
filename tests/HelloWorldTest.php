<?php

use Silex\WebTestCase;

class HelloWorldTest extends WebTestCase
{
    public function createApplication()
    {
        $app = require __DIR__.'/../app/app.php';
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

    public function testAcceptJson()
    {
	$excepted = json_encode(array('first' => 'Hello', 'second' => 'World'));	
	$client = $this->createClient();
	$client->request('GET', '/api/hello', array(), array(), array('HTTP_ACCEPT' => 'application/json' , 'CONTENT_TYPE' => 'application/json')); 
	$response = $client->getResponse();
	$data = $response->getContent();
	$this->assertEquals($excepted, $data);
    }

    public function testHelloToto()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/hello/toto');
        $this->assertCount(1, $crawler->filter('h1:contains("Hello toto")'));
    }

    public function testOnlyOneH1()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertCount(1, $crawler->filter('h1'));
    }
}
