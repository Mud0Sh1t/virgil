<?php
/**
 * Created by PhpStorm.
 * User: Mud0yane
 * Date: 30/05/2019
 * Time: 15:41
 */

namespace AppBundle\Controller;

use AppBundle\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends Controller
{
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @Route("/news", name="news")
     */
    public function NewsAction()
    {
        $news = $this->newsRepository->findByMostRecent();

        return $this->render('default/news.html.twig',
            ['news' => $news]
        );
    }

    /**
     * @Route("/news/{id}", name="new")
     */
    public function NewAction($id)
    {
        $new = $this->newsRepository->findOneBy($id);

        return $this->render('default/new.html.twig',
            ['new' => $new]
        );
    }
}