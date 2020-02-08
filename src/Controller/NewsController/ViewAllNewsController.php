<?php

namespace App\Controller\NewsController;

use App\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewAllNewsController
 * @package App\Controller\NewsController
 */
class ViewAllNewsController
{
	public function __invoke(Environment $twig, NewsRepository $newsRepository): Response
	{
		$news = $newsRepository->findByMostRecent();

		return new Response($twig->render('default/news/news.html.twig',
			['news' => $news]
		));
	}
}