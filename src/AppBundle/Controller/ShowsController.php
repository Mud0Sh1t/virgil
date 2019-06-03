<?php
/**
 * Created by PhpStorm.
 * User: Mud0yane
 * Date: 30/05/2019
 * Time: 15:41
 */

namespace AppBundle\Controller;


use AppBundle\Entity\ShowEntity;
use AppBundle\Repository\ShowsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ShowsController extends Controller
{

    /**
     * @Route("/shows", name="shows")
     */
    public function ShowsAction()
    {
        $shows = $this->getDoctrine()->getRepository(ShowEntity::class)->findByMostRecent();

        return $this->render('default/shows.html.twig',
          ['shows' => $shows]
        );
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function ShowAction($id)
    {
        $show = $this->getDoctrine()->getRepository(ShowEntity::class)->find($id);

        return $this->render('default/show.html.twig',
            ['show' => $show]
        );

    }
}