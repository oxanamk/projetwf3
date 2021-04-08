<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/aboutus", name="about_us")
     */
    public function index(): Response
    {
        return $this->render('about_us/index.html.twig', [
            'controller_name' => 'AboutUsController',
        ]);
    }
    /**
     * @Route("/aboutus/nous_aider", name="nous_aider")
     */
    public function nousAider(): Response
    {
        return $this->render('about_us/nous_aider.html.twig', [
            'controller_name' => 'AboutUsController',
        ]);
    }
}
