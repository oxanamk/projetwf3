<?php

namespace App\Controller;

use App\Entity\Announce;
use App\Form\NewAnnonceType as FormNewAnnonceType;
use App\Form\Type\NewAnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateAnnounceController extends AbstractController
{
    /**
     * @Route("/create/announce", name="create_announce")
     */
    public function create(Request $request): Response {

        $annonce = new Announce();

        $form = $this->createForm(FormNewAnnonceType::class, $annonce);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('create_announce/index.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        } else {
            // On utilise les données de notre formulaire

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return new Response('annonce publiée');
        }
    }
}