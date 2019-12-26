<?php

namespace App\tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	public function testCreateUserAdmin()
	{
		$user = new User();
		$userName = "adminTest";
		$userPwd = "azertyuiop";

		$user->setUsername($userName);
		$user->setPassword($userPwd);

		$this->assertEquals($userName, $user->getUsername());
		$this->assertEquals($userPwd, $user->getPassword());
		echo "\n\rTest Create User OK";
	}
}