<?php

namespace Tests\Controller\BioController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class BioControllerTest extends WebTestCase
{
	public function testBioPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/bio");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nBioPage OK";
	}
}