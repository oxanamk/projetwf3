<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhoAreYouController extends AbstractController
{
    /**
     * @Route("/who/are/you", name="who_are_you")
     */
    public function index(): Response
    {
        return $this->render('who_are_you/index.html.twig', [
            'controller_name' => 'WhoAreYouController',
        ]);
    }
}
