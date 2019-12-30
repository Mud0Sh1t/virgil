<?php

namespace Tests\Controller\NewsController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewOneNewsControllerTest extends WebTestCase
{
	public function testOneNewsPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/news/1");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nOneNews Page OK";
	}
}