<?php

namespace App\Controller\BioController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class BioController
 * @package App\Controller\BioController
 * @Route("/bio", methods={"GET"}, name="biographie")
 */
class BioController
{
	public function __invoke(Environment $twig):Response
	{
		return new Response($twig->render('default/bio.html.twig'));
	}
}