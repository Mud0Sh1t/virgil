<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
class MediaController extends Controller
{

    /**
     * @Route("/media", name="media")
     */
    public function mediaAction()
    {
        $medias = $this->getDoctrine()->getRepository(Media::class)->findAll();

        return $this->render('default/media.html.twig',
            ['medias' => $medias]
        );
    }
}