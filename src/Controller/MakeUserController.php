<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CreateUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakeUserController extends AbstractController
{
    /**
     * @Route("/make/user", name="make_user")
     */
    public function create(Request $request): Response {

        $User = new User();

        $form = $this->createForm(CreateUserType::class, $User);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('make_user/index.html.twig', [
                'form' => $form->createView(),
            ]);
        } else {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($User);
            $entityManager->flush();

            return new Response('Compte créé');
        }
    }
}
