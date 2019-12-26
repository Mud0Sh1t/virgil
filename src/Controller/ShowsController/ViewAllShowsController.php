<?php


namespace App\Controller\ShowsController;


use App\Repository\ShowsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewAllShowsController
 * @package App\Controller\ShowsController
 * @Route("/shows", methods={"GET"}, name="shows")
 */
class ViewAllShowsController
{
	public function __invoke(Environment $twig, ShowsRepository $showsRepository): Response
	{
		$shows = $showsRepository->findByMostRecent();

		return new Response($twig->render('default/show/shows.html.twig',
			['shows' => $shows]
		));
	}
}