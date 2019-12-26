<?php


namespace App\Controller\NewsController;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewOneNewsController
 * @package App\Controller\NewsController
 * @Route("/news/{id}", methods={"GET"}, name="new")
 */
class ViewOneNewsController
{
	public function __invoke(Environment $twig, NewsRepository $newsRepository, News $news): Response
	{
		return new Response($twig->render('default/news/new.html.twig',
			['new' => $news]
		));
	}
}