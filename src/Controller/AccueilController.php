<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Form\RechercheType;
use App\Form\Type\FilterAnnounceType;
use App\Repository\AnnouncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="start")
     */
    public function startPage(): Response
    {
        return $this->render('accueil/start.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(AnnouncesRepository $annoncesRepo, Request $request): Response
    {

        $form = $this->createForm(RechercheType::class, null, array(
            'action' => $this->generateUrl('announces_page'),
            'method' => 'POST',
        ));

        $repository = $this->getDoctrine()->getRepository(Announces::class);
            $annonces = $repository->findBy(array(), null, '3', null);

            return $this->render('accueil/index.html.twig', [    
            'annonces' => $annonces,
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]);
        
    }
}
