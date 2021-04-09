<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\CreateUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SignUpController extends AbstractController
{
    /**
     * @Route("/sign/up", name="sign_up")
     */

    public function create(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response {

        $user = new Users();

        $form = $this->createForm(CreateUserType::class, $user);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('sign_up/index.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
					$user->setPassword($password);
            $roles = $user->getRoles();
            $user->setRoles($roles);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->render('about_us/index.html.twig');
        }
    }
}
