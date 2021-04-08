<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Entity\Users;
use App\Form\Type\CreateAnnounceType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\User\UserInterface;

class CreateAnnounceController extends AbstractController
{
    /**
     * @Route("/create/announce/handler", name="create_announce_handler")
     */
    public function handlerCreateAnnonce(Request $request): Response {

        $annonce = new Announces();

        $form = $this->createForm(CreateAnnounceType::class, $annonce);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('../accueil/index.html.twig', [
            ]);
        } 
    }

    /**
     * @Route("/create/announce", name="create_announce")
     */
    public function creerAnnonce(Request $r, UserInterface $user): Response {

        $annonce = new Announces();

        $form = $this->createForm(CreateAnnounceType::class, $annonce, array(
            'action' => $this->generateUrl('create_announce_handler'),
            'method' => 'POST',
        ));

        $form->handleRequest($r);

        if (!$form->isSubmitted() || !$form->isValid()) {
            
            return $this->render('create_announce/create_announce.html.twig', [
                'form' => $form->createView(),
                ]);
        } else {

            // Je vais déplacer le fichier uploadé
            
            // On récupère l'image
            $image = $form->get('image')->getData();
            // On définit le nom du fichier
            $fileName =  uniqid() . '.' . $image->guessExtension();
            
            try {
                // On déplace le fichier
                $image->move($this->getParameter('images'), $fileName);
            } catch (FileException $ex) {
                $form->addError(new FormError('Une erreur est survenue pendant l\'upload du fichier : ' . $ex->getMessage()));
                throw new Exception('File upload error');
            }
            
            
            $user = $this->getUser();
            $annonce->setImage($fileName);
            $annonce->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            return $this->redirect('../mon_compte');
        }
    }
}