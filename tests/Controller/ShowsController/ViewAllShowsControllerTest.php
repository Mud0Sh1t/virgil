<?php

namespace Tests\Controller\ShowsController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewAllShowsControllerTest extends WebTestCase
{
	public function testShowsPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/shows");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nShowsPage Page OK";
	}
}