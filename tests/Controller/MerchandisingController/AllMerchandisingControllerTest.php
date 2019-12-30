<?php


namespace Tests\Controller\MerchandisingController;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AllMerchandisingControllerTest extends WebTestCase
{
	public function testMerchPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/merchandising");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nMerchPage OK";
	}
}