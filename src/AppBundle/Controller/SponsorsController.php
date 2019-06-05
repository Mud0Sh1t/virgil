<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Sponsors;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SponsorsController extends Controller
{

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        $sponsors = $this->getDoctrine()->getRepository(Sponsors::class)->findAll();

        return $this->render('default/contact.html.twig',
            ['sponsors' => $sponsors]
        );
    }

}