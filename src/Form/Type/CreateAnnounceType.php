<?php

namespace App\Form\Type;

use App\Entity\Announces;
use App\Entity\Caracteres;
use App\Entity\ConditionsVie;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CreateAnnounceType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('titre', TextType::class, [
            'attr' => [
                'label' => 'Titre :',
                'placeholder' => 'Titre de votre annonce',
                'class' => 'form-control mt-3',
                'name' => 'titre',
                'type' => 'text',
                'id' => 'titre',
                'required'
            ]
        ])
        ->add('prenom', TextType::class, [
            'attr' => [
                'label' => 'Prenom :',
                'placeholder' => 'Votre prenom',
                'class' => 'form-control mt-3',
                'name' => 'prenom',
                'type' => 'text',
                'id' => 'prenom',
                'required'
            ]
        ])
        ->add('nom', TextType::class, [
            'attr' => [
                'label' => 'Nom :',
                'placeholder' => 'Votre nom',
                'class' => 'form-control mt-3',
                'name' => 'nom',
                'type' => 'text',
                'id' => 'nom',
                'required'
            ]
        ])
        ->add('age', NumberType::class, [
            'attr' => [
                'label' => 'Age :',
                'placeholder' => 'Votre age',
                'class' => 'form-control mt-3',
                'name' => 'age',
                'type' => 'number',
                'id' => 'age',
                'required'
            ]
        ] )
        ->add('statut', ChoiceType::class, [
            'choices' => [
                'Particulier' => 'Particulier',
                'Eleveur' => 'Eleveur',
                'Adoptant' => 'Adoptant',
            ],
            'attr' => [
                'label' => 'Statut :',
                'placeholder' => 'Votre statut',
                'class' => 'form-control mt-3',
                'name' => 'statut',
                'type' => 'text',
                'id' => 'statut',
                'required'
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
            'label' => 'Image d\'illustration de votre annonce',
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
        ->add('date', DateType::class, [
            'format' => 'dd/MM/yyyy',
        ])
        ->add('description', TextareaType::class, [
            'attr' => [
                'label' => 'Description :',
                'placeholder' => 'Description de votre annonce',
                'class' => 'form-control mt-3',
                'name' => 'description',
                'type' => 'textarea',
                'id' => 'description',
                'required'
            ]
        ])
        ->add('qualites', EntityType::class, [
            'label' => 'Choisir vos principales qualités : ',
            'attr' => [
                'class' => 'checker text-center font-weight-semibold',
                'required'
            ],
            'class' => 'App\Entity\Caracteres',
            'choice_label' => 'nom_caractere',
            'expanded' => 'true',
            'multiple'=>'true']
            )
        ->add('conditions_de_vie', EntityType::class, [
            'label' => 'Choisir des conditions de vies idéales  : ',
            'attr' => [
                'class' => 'checker text-center font-weight-semibold',
                'required'
            ],
            'class' => 'App\Entity\ConditionsVie',
            'choice_label' => 'type',
            'expanded' => 'true',
            'multiple'=>'true'
        ])
        ->add('description', TextareaType::class, [
            'attr' => [
                'label' => 'Description :',
                'placeholder' => 'Description de votre annonce',
                'class' => 'form-control mt-3',
                'name' => 'description',
                'type' => 'textarea',
                'id' => 'description',
                'required'
            ]
        ])
        ->add('tel', NumberType::class, [
            'attr' => [
                'label' => 'N°tel :',
                'placeholder' => 'Votre numéro pour vous contacter',
                'class' => 'form-control mt-3',
                'name' => 'tel',
                'type' => 'number',
                'id' => 'tel',
                'required'
            ]
        ])
        ->add('email', EmailType::class, [
            'attr' => [
                'label' => 'E-mail :',
                'placeholder' => 'Votre e-mail',
                'class' => 'form-control',
                'name' => 'email',
                'type' => 'email',
                'id' => 'email',
                'required'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'attr' => [
                'label' => 'Publier votre annonce',
                'class' => 'btn btn-lg mt-3 text-center btnsignup',
            ]
        ])
    ;
}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announces::class,
        ]);
    }
}
