<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncesPageController extends AbstractController
{
    /**
     * @Route("/announces/page", name="announces_page")
     */
    public function index(): Response
    {
        return $this->render('announces_page/index.html.twig', [
            'controller_name' => 'AnnouncesPageController',
        ]);
    }
}
