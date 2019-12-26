<?php


namespace App\Controller\MerchandisingController;

use App\Repository\MerchandisingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class AllMerchandisingController
 * @package App\Controller\MerchandisingController
 * @Route("/merchandising", methods={"GET"}, name="merchandising")
 */
class AllMerchandisingController
{
	public function __invoke(Environment $twig, MerchandisingRepository $merchandisingRepository): Response
	{
		$merchs = $merchandisingRepository->findAll();

		return new Response($twig->render('default/merch/merchandising.html.twig',
            ['merchs' => $merchs]
		));
	}
}