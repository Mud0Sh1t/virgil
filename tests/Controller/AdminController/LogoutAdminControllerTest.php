<?php


namespace Tests\Controller\AdminController;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class LogoutAdminControllerTest extends WebTestCase
{
	public function testLogoutAdmin()
	{
		$client = static::createClient();
		$crawler = $client->request("GET", "/admin");

		$form = $crawler->selectButton("login")->form();
		$form['username'] = "AdminTestUnity";
		$form['password'] = "azerty";
		$client->submit($form);

		$crawler = $client->followRedirect();

		$this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

		$crawler = $client->request("GET", "/logout");

		$crawler = $client->followRedirect();

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\nLogout Admin Test OK";
	}
}