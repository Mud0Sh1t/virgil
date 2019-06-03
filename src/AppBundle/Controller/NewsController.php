<?php
/**
 * Created by PhpStorm.
 * User: Mud0yane
 * Date: 30/05/2019
 * Time: 15:41
 */

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends Controller
{

    /**
     * @Route("/news", name="news")
     */
    public function NewsAction()
    {
        $news = $this->getDoctrine()->getRepository(News::class)->findByMostRecent();

        return $this->render('default/news.html.twig',
            ['news' => $news]
        );
    }

    /**
     * @Route("/news/{id}", name="new")
     */
    public function NewAction($id)
    {
        $new = $this->getDoctrine()->getRepository(News::class)->find($id);

        return $this->render('default/new.html.twig',
            ['new' => $new]
        );
    }
}