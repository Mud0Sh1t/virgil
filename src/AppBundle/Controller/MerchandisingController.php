<?php


namespace AppBundle\Controller;



use AppBundle\Entity\Merchandising;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class MerchandisingController extends Controller
{
    /**
     * @Route("/merchandising", name="merchandising"
     */
    public function merchAction()
    {
        $merchs = $this->getDoctrine()->getRepository(Merchandising::class)->findAll();

        return $this->render('default/',
            ['merchs' => $merchs]
        );
    }

}