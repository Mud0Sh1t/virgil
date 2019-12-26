<?php


namespace App\Controller\ShowsController;

use App\Entity\Show;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewOneShowController
 * @package App\Controller\ShowsController
 * @Route("/show/{id}", methods={"GET"}, name="show")
 */
class ViewOneShowController
{
	public function __invoke(Environment $twig, Show $show): Response
	{
		return new Response($twig->render('default/show/show.html.twig',
			['show' => $show]
		));
	}
}