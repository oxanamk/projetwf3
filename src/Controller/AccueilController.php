<?php

namespace App\Controller;

use App\Entity\Announces;
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
        $repository = $this->getDoctrine()->getRepository(Announces::class);
            $annonces = $repository->findBy(array(), null, '2', null);

            return $this->render('accueil/index.html.twig', [    
            'annonces' => $annonces,
            'controller_name' => 'AccueilController',
        ]);
    }
}
