<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class EditMonCompteType extends AbstractType
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
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes doivent être identique.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Votre mot de passe'],
                'second_options' => ['label' => 'Comfirmer votre mot de passe'],
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
            ->add('image', FileType::class, [
                        'attr' => [
                            'label' => 'Image :',
                            'placeholder' => 'Votre image',
                            'class' => 'form-control mt-3',
                            'name' => 'image',
                            'type' => 'image',
                            'id' => 'InputImage',
                            'required'
                        ],
                        'label' => 'Image de votre profil',
                        'data_class' => null,
                        'constraints' => [
                            new File([
                                'maxSize' => '5M',
                                'mimeTypes' => [
                                    'image/jpeg',
                                    'image/png',
                                    'image/gif',
                                ]
                            ]),
                        ]
                    ])
            ->add('description', TextareaType::class, [
                        'attr' => [
                            'label' => 'Description :',
                            'placeholder' => 'A propos de vous',
                            'class' => 'form-control mt-3',
                            'name' => 'description',
                            'type' => 'textarea',
                            'id' => 'description',
                            'required'
                        ]
             ])
            ->add('submit', SubmitType::class, [
                'label' => 'Editer mon compte',
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
