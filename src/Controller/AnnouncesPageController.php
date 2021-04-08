<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Form\Type\FilterAnnounceType;
use App\Repository\AnnouncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncesPageController extends AbstractController
{
    /**
     * @Route("/announces/page", name="announces_page")
     */
    public function afficherTousLesArticle(AnnouncesRepository $annoncesRepo, Request $request): Response
    {



        $form = $this->createForm(FilterAnnounceType::class, null, array(
            'action' => $this->generateUrl('announces_page'),
            'method' => 'POST',
        ));

        $search = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonces = $annoncesRepo->search(
                $search->get('espece')->getData(),
                $search->get('couleur')->getData(),
                $search->get('statut')->getData(),
            );
            return $this->render('announces_page/index.html.twig', [
                'form' => $search->createView(),
                'annonces' => $annonces
            ]);
        } else {
            $repository = $this->getDoctrine()->getRepository(Announces::class);
            $annonces = $repository->findAll();
            return $this->render('announces_page/index.html.twig', [
                'form' => $form->createView(),
                'annonces' => $annonces
            ]);
        }
        return new Response('faux');
    }

    /**
     * @Route("/announces/page/voir_annonce/{id}", name="voir_annonce")
     */


    public function voirAnnonce(): Response
    {
        return $this->render('accueil/start.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
