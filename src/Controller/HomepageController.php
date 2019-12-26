<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class HomepageController
 * @package App\Controller
 * @Route(path="/", methods={"GET"}, name="homepage")
 */
class HomepageController
{
	public function __invoke(Environment $twig): Response
	{
		return new Response($twig->render('default/index.html.twig'));
	}
}