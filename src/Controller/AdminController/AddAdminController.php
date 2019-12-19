<?php

namespace App\Controller\AdminController;

use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;

/**
 * Class AddAdminController
 * @package App\Controller\AdminController
 * @Route("/addAdmin", name="addAdmin")
 */
class AddAdminController extends AbstractController
{
	public function __invoke(Request $request, FormFactoryInterface $formFactory, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, Environment $twig): Response
	{
		$user = new User();
		$form = $formFactory->create(UserType::class, $user);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()){
			$pwd = $passwordEncoder->encodePassword($user, $user->getPassword());
			$user->setPassword($pwd);

			$entityManager->persist($user);
			$entityManager->flush();

			return $this->redirectToRoute('login');
		}


		return new Response($twig->render('Security/addAdmin.html.twig',
			[
				'form' => $form->createView()
			]
		));
	}
}