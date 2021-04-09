<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as MimeEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactController extends AbstractController {
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response {

        $this->get('session')->getFlashBag()->add(
            'notice',
            'Votre e-mail a bien été envoyé !'
        );
        $data = $request->request->all();

            $text = 'Quelqu\'un vous a envoyé une demande de contact sur votre site. Cette personne s\'appelle ' . $data['nom'] . '.' . PHP_EOL . PHP_EOL
                . 'Voici son message : ' . PHP_EOL . PHP_EOL
                . $data['message'] . PHP_EOL . PHP_EOL
                . 'Si vous voulez lui répondre, veuillez écrire à l\'adresse : ' . $data['email'];


            $email = new MimeEmail();
            $email->from(Address::create('Portfolio de 2alheure <test.symfony@2alheure.fr>'))
                ->to('Enji28500@hotmail.fr')
                ->replyTo($data['email'])
                ->subject('Tu as reçu un mail de contact !')
                ->html('<html><body>test')
                ->text($text);

            $mailer->send($email);

            return $this->redirectToRoute('accueil');
        
    }
}