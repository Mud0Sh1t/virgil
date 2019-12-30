<?php


namespace Tests\Controller\MediaController;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ViewAllMediaControllerTest extends WebTestCase
{
	public function testMediaPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/media");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nMediaPage OK";
	}
}