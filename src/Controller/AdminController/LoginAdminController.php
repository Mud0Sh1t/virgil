<?php

namespace App\Controller\AdminController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

/**
 * Class LoginAdminController
 * @package App\Controller\AdminController
 * @Route("/admin", name="login")
 */
class LoginAdminController
{
	public function __invoke(AuthenticationUtils $authenticationUtils, Environment $twig): Response
	{
		$error = $authenticationUtils->getLastAuthenticationError();

		$lastUsername = $authenticationUtils->getLastUsername();

		return new Response($twig->render('Security/login.html.twig',
			[
				'error'     => $error,
				'username'  => $lastUsername,
			]
		));
	}
}