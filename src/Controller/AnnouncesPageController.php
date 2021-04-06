<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Form\Type\FilterAnnounceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncesPageController extends AbstractController
{
    /**
     * @Route("/announces/page", name="announces_page")
     */
    public function afficherTousLesArticle(Request $request): Response
    {



        $form = $this->createForm(FilterAnnounceType::class, null, array(
            'action' => $this->generateUrl('announces_page'),
            'method' => 'POST',
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $repository = $this->getDoctrine()->getRepository(Announces::class);
           # $annonces = $repository->findBy();
       
           
        } else {     
            $repository = $this->getDoctrine()->getRepository(Announces::class);
            $annonces = $repository->findAll();
            return $this->render('announces_page/index.html.twig', [
                'form' => $form->createView(),
                'annonces' => $annonces
            
 ]);    }return new Response('faux');
}
}
