<?php

namespace Tests\Controller\SponsorsController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewAllSponsorsControllerTest extends WebTestCase
{
	public function testSponsorsPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/contact");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nSponsorsPage Page OK";
	}
}