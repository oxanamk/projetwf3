<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Form\FilterFormType;
use App\Repository\AnnouncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AnnouncesPageController extends AbstractController
{
    /**
     * @Route("/announces/page", name="announces_page")
     */
    public function afficherTousLesArticle(AnnouncesRepository $repository, Request $request): Response
    {



        $form = $this->createForm(FilterFormType::class, null, array(
            'action' => $this->generateUrl('announces_page'),
            'method' => 'POST',
        ));

        $search = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonces = $repository->search(
                $search->get('espece')->getData(),
                $search->get('couleur')->getData(),
                $search->get('statut')->getData(),
                // $search->get('qualites')->getData(),
                // $search->get('conditions_de_vie')->getData(),
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
     * @Route("/annonce/{id}", name="annonce")
     */
    public function afficherUneAnnonce( Announces $id): Response {
        $repository = $this->getDoctrine()->getRepository(Announces::class);
        $annonce = $repository->find($id);

        if (empty($annonce)) throw new NotFoundHttpException();


        return $this->render('announces_page/annonce.html.twig', [
            'annonces' => $annonce,
        ]);
    }
}
