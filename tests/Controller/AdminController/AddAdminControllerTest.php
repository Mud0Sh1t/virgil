<?php

namespace Tests\Controller\AdminController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AddAdminControllerTest extends WebTestCase
{
	public function testPageAddAdminIsUp()
	{
		$client = static::createClient();
		$client->request("GET", "/addAdmin");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
		echo "\r\nForm AdminPage OK";
	}

	public function testAddAdmin()
	{
		$client = static::createClient();
		$crawler = $client->request("GET", "/addAdmin");

		$form = $crawler->selectButton("Register !")->form();
		$form['user[username]'] = "AdminTestUnity";
		$form['user[password]'] = "azerty";
		$client->submit($form);

		$this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
		$this->assertTrue($client->getResponse()->isRedirect());
		$crawler = $client->request("GET", "/admin");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\nAdd AdminTest OK";
	}

	public function testLoginLogoutAdmin()
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

		$crawler = $client->request("GET", "/logout");

		$crawler = $client->followRedirect();

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\nLogout Admin Test OK";
	}

	public function testAddShowBo()
	{
		$client = static::createClient();
		$crawler = $client->request("GET", "/admin");

		$form = $crawler->selectButton("login")->form();
		$form['username'] = "AdminTestUnity";
		$form['password'] = "azerty";
		$client->submit($form);

		$crawler = $client->followRedirect();

		$crawler = $client->request("GET", "/TheNinthDoor/?entity=Concert");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\n=======================";
		echo "\nPage list Concert OK";

		$crawler = $client->request("GET", "/TheNinthDoor/?entity=Concert&amp;action=new&amp;menuIndex=0&amp;submenuIndex=-1&amp;sortField=id&amp;sortDirection=DESC&amp;page=1&amp;referer=%252FTheNinthDoor%252F%253Fentity%253DConcert%2526action%253Dlist%2526menuIndex%253D0%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1");

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\nPage Form Concert OK";

		$form = $crawler->selectButton("Save changes")->form();
		$form['concert[name]'] = "Concert 1";
		$form['concert[concertHall]'] = "Salle Concert 1";
		$form['concert[date][date][month]'] = 1;
		$form['concert[date][date][day]'] = 1;
		$form['concert[date][date][year]'] = 2020;
		$form['concert[date][time][hour]'] = 12;
		$form['concert[date][time][minute]'] = 00;
		$form['concert[info]'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Morbi quis laoreet sem, sed fermentum libero. Nulla vel odio ut justo hendrerit efficitur. 
		In lobortis pellentesque ex ac bibendum. Quisque eu libero cursus, cursus tortor eget, aliquam elit. 
		Proin in ultricies elit, nec vestibulum enim. Integer sodales dolor id dolor vulputate, et finibus ipsum maximus. 
		Mauris sit amet nibh in ex vulputate tempus. Donec vel commodo ligula. Aliquam pulvinar massa quis lobortis viverra.
		Maecenas dolor enim, ornare ac nulla nec, mattis sagittis orci. Donec pretium porttitor ante ac feugiat. 
		Quisque nec auctor sem. Aliquam ultrices nisi non mollis molestie. Donec non odio ex. 
		Morbi commodo purus lorem, nec aliquet odio ornare eget.";
		$form['concert[adress]'] = "134 Rue royal";
		$form['concert[city]'] = "Lille";
		$form['concert[region]'] = "Nord";
		$form['concert[country]'] = "France";
		$form['concert[bookingLink]'] = "https://www.google.fr/";
		$client->submit($form);

		$this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());

		$crawler = $client->request("GET", "/logout");

		$crawler = $client->followRedirect();

		$this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());

		echo "\nSubmit Form Concert Ok";
		echo "\n=======================";
	}
	//?entity=Concert&amp;action=edit&amp;menuIndex=0&amp;submenuIndex=-1&amp;sortField=id&amp;sortDirection=DESC&amp;page=1&amp;referer=%252FTheNinthDoor%252F%253Fentity%253DConcert%2526action%253Dlist%2526menuIndex%253D0%2526submenuIndex%253D-1%2526sortField%253Did%2526sortDirection%253DDESC%2526page%253D1&amp;id=5
}