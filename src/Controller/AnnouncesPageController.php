<?php

namespace App\Controller;

use App\Entity\Announces;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncesPageController extends AbstractController
{
    /**
     * @Route("/announces/page", name="announces_page")
     */
    public function afficherTousLesArticle(): Response {
        $repository = $this->getDoctrine()->getRepository(Announces::class);
        $annonces = $repository->findAll();

        return $this->render('announces_page/index.html.twig', [
            'annonces' => $annonces
        ]);
    }
}
