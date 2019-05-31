<?php
/**
 * Created by PhpStorm.
 * User: Mud0yane
 * Date: 30/05/2019
 * Time: 15:41
 */

namespace AppBundle\Controller;


use AppBundle\Repository\ShowsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ShowsController extends Controller
{
    private $showsRepository;

    public function __construct(ShowsRepository $showsRepository)
    {
        $this->showsRepository = $showsRepository;
    }


    /**
     * @Route("/shows", name="shows")
     */
    public function ShowsAction()
    {
        $shows = $this->showsRepository->findByMostRecent();

        return $this->render('default/shows.html.twig',
          ['shows' => $shows]
        );
    }
}