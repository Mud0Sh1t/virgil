<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomepageControllerTest extends WebTestCase
{
	public function testHomepageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nHomePage OK";
	}

	/*public function testHomepageToBio()
	{
		$client = static::createClient();
		$crawler = $client->request("GET", "/");

		$bioLink = $crawler->selectLink("/bio")->link();
		$client->click($bioLink);
		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nHomepage to Biographie OK";
	}*/
}