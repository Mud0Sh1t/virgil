<?php
/**
 * Created by PhpStorm.
 * User: Mud0yane
 * Date: 30/05/2019
 * Time: 15:41
 */

namespace AppBundle\Controller;


use AppBundle\Entity\NewsEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news")
     */
    public function NewsAction(){

        $em = $this->getDoctrine()->getManager();

        $news = $em->getRepository(NewsEntity::class)->findAll();

        return $this->render('default/news.html.twig',
            ['news' => $news]
        );
    }
}