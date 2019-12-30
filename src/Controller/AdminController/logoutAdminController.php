<?php


namespace App\Controller\AdminController;

use Symfony\Component\Routing\Annotation\Route;

/**
 * Class logoutAdminController
 * @package App\Controller\AdminController
 * @Route("/logout", name="logout")
 */
class logoutAdminController
{
	public function __invoke()
	{
		return new \Exception('Logout success');
	}
}