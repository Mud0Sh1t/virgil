<?php


namespace Tests\Controller\ShowsController;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewOneShowControllerTest extends WebTestCase
{
	public function testOneShowPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/show/19");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nOneShowPage Page OK";
	}
}