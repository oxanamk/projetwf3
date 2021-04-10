<?php

namespace App\Controller;

use App\Entity\Announces;
use App\Entity\Users;
use App\Form\EditMonCompteType;
use App\Form\Type\CreateAnnounceType;
use App\Repository\AnnouncesRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class MonCompteController extends AbstractController
{
    /**
     * @Route("/redirection", name="redirection")
     */
    public function redirectionById(UserInterface $user): Response
    {
        
        $id = $this->getUser()->getId();

        return $this->redirect('mon_compte/' . $id);
    }


    /**
     * @Route("/mon_compte/{id}", name="mon_compte")
     */
    public function index($id = null, Request $r, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $users = new Users();
        $id = $this->getUser()->getId();
        
        $editCompte = $this->getDoctrine()
        ->getRepository(Users::class);
        $account = $editCompte->find($id);
        
        $form = $this->createForm(EditMonCompteType::class, $account, array(
            'action' => $this->generateUrl('mon_compte'),
            'method' => 'POST',
        ));
        
        $form->handleRequest($r);
        
        $userPseudo = $this->getUser()->getPseudo();
        $userStatut = $this->getUser()->getStatut();
        $userImage = $this->getUser()->getImage();
        $userDescription = $this->getUser()->getDescription();
        


        $annonce = $this->getDoctrine()
        ->getRepository(Announces::class)
        ->findBy(['user' => $id]);

        if (!$form->isSubmitted() || !$form->isValid()) {

            
            return $this->render('mon_compte/index.html.twig', [
                'form' => $form->createView(),
                'controller_name' => 'MonCompteController',
                'userPseudo' => $userPseudo,
                'userStatut' => $userStatut,
                'userImage' => $userImage,
                'userDescription' => $userDescription,
                'annonce' => $annonce,
                ]);
            }
        else {

            $image = $form->get('image')->getData();

            $fileName =  uniqid() . '.' . $image->guessExtension();
            
            try {

                $image->move($this->getParameter('images'), $fileName);
            } catch (FileException $ex) {
                $form->addError(new FormError('Une erreur est survenue pendant l\'upload du fichier : ' . $ex->getMessage()));
                throw new Exception('File upload error');
            }

            $user = $this->getUser();
            $newpwd = $form->get('password')['first']->getData();
            $newEncodedPassword = $passwordEncoder->encodePassword($user, $newpwd);

            $user->setPassword($newEncodedPassword);

            $account->setImage($fileName);
            $roles = $user->getRoles();
            $user->setRoles($roles);

            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();

            return $this->redirect('redirection');
    }
}

    /**
     * @Route("/mon_annonce/{id}", name="mon_annonce")
     */

    public function modifierAnnonce($id, Request $r): Response {

        $repo = $this->getDoctrine()->getRepository(Announces::class);
        $annonce = $repo->find($id);

        if (empty($annonce)) throw new NotFoundHttpException();

        $form = $this->createForm(CreateAnnounceType::class, $annonce);

        $form->handleRequest($r);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('create_announce/modifier_annonce.index.html.twig', [
                'form' => $form->createView(),
                'id' => $annonce->getId()
            ]);
        } else {

            // Je vais déplacer le fichier uploadé
            $image = $form->get('image')->getData();

            $fileName =  uniqid() . '.' . $image->guessExtension();

            try {
                $image->move($this->getParameter('images'), $fileName);
            } catch (FileException $ex) {
                $form->addError(new FormError('Une erreur est survenue pendant l\'upload du fichier : ' . $ex->getMessage()));
                throw new Exception('File upload error');
            }

            $annonce->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('accueil');        }
    }
    /**
     * @Route("/supprimer-une-annonce/{id}", name="supprimer_annonce")
     */
    public function supprimerAnnonce($id): Response {

        $repo = $this->getDoctrine()->getRepository(Announces::class);
        $annonce = $repo->find($id);

        if (empty($annonce)) throw new NotFoundHttpException();

        $em = $this->getDoctrine()->getManager();
        $em->remove($annonce);
        $em->flush();

        return $this->redirectToRoute('redirection');
    }
}