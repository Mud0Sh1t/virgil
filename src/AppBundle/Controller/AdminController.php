<?php
/**
 * Created by PhpStorm.
 * User: MUD0
 * Date: 29/05/2019
 * Time: 12:21
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    /**
     * @Route("/addAdmin", name="addAdmin")
     */
    public function addAdminAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $pwd = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($pwd);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }
        return $this->render('Security/addAdmin.html.twig',
            ['form' => $form->createView()]
        );
    }

    /**
     * @Route("/admin", name="login")
     */
    public function adminAction(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Security/login.html.twig',
            [
                'error'     => $error,
                'username'  => $lastUsername,
            ]
        );
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \Exception('Logout success');
    }

}