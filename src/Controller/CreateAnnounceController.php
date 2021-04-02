<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\AnnonceType;
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

        $annonce = new Annonces();

        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On utilise les données de notre formulaire
            $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return new Response('annonce publiée');
        }
    }
}