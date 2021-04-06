<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
            'attr' => [
                'label' => 'E-mail :',
                'placeholder' => 'Votre E-mail',
                'class' => 'form-control',
                'name' => 'email',
                'type' => 'email',
                'id' => 'inputEmail',
                'required',
                'autofocus'
             ]
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'label' => 'Password :',
                    'placeholder' => 'Votre mot de passe',
                    'class' => 'form-control',
                    'name' => 'password',
                    'type' => 'text',
                    'id' => 'inputPassword',
                    'required',
                    'autofocus'
                    ]
                    ])
            ->add('pseudo', TextType::class, [
                'attr' => [
                    'label' => 'Pseudo :',
                    'placeholder' => 'Votre Pseudo',
                    'class' => 'form-control',
                    'name' => 'pseudo',
                    'type' => 'text',
                    'id' => 'inputPseudo',
                    'required',
                    'autofocus'
                    ]
                    ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Particulier' => 'Particulier',
                    'Eleveur' => 'Eleveur',
                ],
                'attr' => [
                    'label' => 'Statut :',
                    'placeholder' => 'Votre statut',
                    'class' => 'form-control',
                    'name' => 'statut',
                    'type' => 'text',
                    'id' => 'inputStatut',
                    'required',
                    'autofocus'
                    ]
                    ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer un compte',
                'attr' => [
                            'class' => 'btn btn-lg mt-3 text-center btnsignup',
                        ]
                    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
