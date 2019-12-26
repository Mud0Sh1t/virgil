<?php

namespace App\Controller\SponsorsController;

use App\Repository\SponsorsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewAllSponsorsController
 * @package App\Controller\SponsorsController
 * @Route("/contact", methods={"GET"}, name="contact")
 */
class ViewAllSponsorsController
{
	public function __invoke(Environment $twig, SponsorsRepository $sponsorsRepository): Response
	{
		$sponsors = $sponsorsRepository->findAll();

		return new Response($twig->render('default/contact.html.twig',
			['sponsors' => $sponsors]
		));
	}
}