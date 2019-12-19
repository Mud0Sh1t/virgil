<?php

namespace App\Controller\MediaController;

use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class ViewAllMediaController
 * @package App\Controller\MediaController
 * @Route("/media", name="media")
 */
class ViewAllMediaController
{
	public function __invoke(Environment $twig, MediaRepository $mediaRepository):Response
	{
		$medias = $mediaRepository->findAll();

		return new Response($twig->render('default/media/media.html.twig',
			['medias' => $medias]
		));
	}
}