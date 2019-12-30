<?php


namespace Tests\Controller\NewsController;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewAllNewsControllerTest extends WebTestCase
{
	public function testAllNewsPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/news");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nAllNewsPage OK";
	}
}