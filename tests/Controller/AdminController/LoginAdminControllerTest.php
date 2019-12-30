<?php

namespace Tests\Controller\AdminController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class LoginAdminControllerTest extends WebTestCase
{
	public function testLoginAdminPageIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/admin");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nForm LoginAdminPage OK";
	}

	public function testLoginAdmin()
	{
		$client = static::createClient();
		$crawler = $client->request("GET", "/admin");

		$form = $crawler->selectButton("login")->form();
		$form['username'] = "AdminTestUnity";
		$form['password'] = "azerty";
		$client->submit($form);

		$crawler = $client->followRedirect();

		$this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

		echo "\nLogin Admin Test OK";
	}
}