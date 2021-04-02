<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AnnonceType extends AbstractType
{
    const OptionQ1 = 'Aimant'; 
    const OptionQ2 = 'Fertile'; 
    const OptionQ3 = 'Espiegle'; 
    const OptionQ4 = 'Mignon'; 
    const OptionQ5 = 'Familial'; 
    const OptionQ6 = 'Independant'; 
    const OptionQ7 = 'Protecteur'; 
    const OptionQ8 = 'Obeissant';
    
    const OptionC1 = 'Ville';
    const OptionC2 = 'Campagne';
    const OptionC3 = 'Famille';
    const OptionC4 = 'Amenagement';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('prenom', TextType::class, [
            'attr' => [
                'label' => 'Prenom :',
                'placeholder' => 'Votre prenom',
                'class' => 'form-control',
                'name' => 'prenom',
                'type' => 'text',
                'id' => 'prenom',
                'required'
            ]
        ])
        ->add('age', NumberType::class, [
            'attr' => [
                'label' => 'Age :',
                'placeholder' => 'Votre age',
                'class' => 'form-control',
                'name' => 'age',
                'type' => 'number',
                'id' => 'age',
                'required'
            ]
        ] ) 
        ->add('nom', TextType::class, [
            'attr' => [
                'label' => 'Nom :',
                'placeholder' => 'Votre nom',
                'class' => 'form-control',
                'name' => 'nom',
                'type' => 'text',
                'id' => 'nom',
                'required'
            ]
        ])
        ->add('image', FileType::class, [
            'attr' => [
            'label' => 'Image de votre annonce',
                'placeholder' => 'Votre image',
                'class' => 'form-control',
                'name' => 'image',
                'type' => 'image',
                'id' => 'image',
                'required' ],
            'data_class' => null,
            'constraints' => [
                new File([
                    'maxSize' => '5M',
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/jpg',
                        'image/png',
                        'image/gif',
                    ]
                ]),
            ]
        ])
        ->add('description', TextareaType::class, [
            'attr' => [
                'label' => 'Description :',
                'placeholder' => 'Description de votre annonce',
                'class' => 'form-control',
                'name' => 'description',
                'type' => 'textarea',
                'id' => 'description',
                'required'
            ]
        ])
            ->add('qualites', ChoiceType::class,[
                'choices'=>[
                    'Aimant'=>self::OptionQ1,
                    'Fertile'=>self::OptionQ2,
                    'Espiegle'=>self::OptionQ3,
                    'Mignon'=>self::OptionQ4,
                    'Familial'=>self::OptionQ5,
                    'Independant'=>self::OptionQ6,
                    'Protecteur'=>self::OptionQ7,
                    'Obeissant'=>self::OptionQ8,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une qualité pour votre animal :',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])
            ->add('qualites2', ChoiceType::class,[
                'choices'=>[
                    'Aimant'=>self::OptionQ1,
                    'Fertile'=>self::OptionQ2,
                    'Espiegle'=>self::OptionQ3,
                    'Mignon'=>self::OptionQ4,
                    'Familial'=>self::OptionQ5,
                    'Independant'=>self::OptionQ6,
                    'Protecteur'=>self::OptionQ7,
                    'Obeissant'=>self::OptionQ8,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une deuxième qualité pour votre animal :',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])
            ->add('qualites3', ChoiceType::class,[
                'choices'=>[
                    'Aimant'=>self::OptionQ1,
                    'Fertile'=>self::OptionQ2,
                    'Espiegle'=>self::OptionQ3,
                    'Mignon'=>self::OptionQ4,
                    'Familial'=>self::OptionQ5,
                    'Independant'=>self::OptionQ6,
                    'Protecteur'=>self::OptionQ7,
                    'Obeissant'=>self::OptionQ8,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une troisième qualité pour votre animal:',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])
            ->add('conditions', ChoiceType::class,[
                'choices'=>[
                    'Ville'=>self::OptionC1,
                    'Campagne'=>self::OptionC2,
                    'Famille'=>self::OptionC3,
                    'Amenagement'=>self::OptionC4,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une condition de vie :',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])
            ->add('conditions2', ChoiceType::class,[
                'choices'=>[
                    'Ville'=>self::OptionC1,
                    'Campagne'=>self::OptionC2,
                    'Famille'=>self::OptionC3,
                    'Amenagement'=>self::OptionC4,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une condition de vie :',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])
            ->add('conditions3', ChoiceType::class,[
                'choices'=>[
                    'Ville'=>self::OptionC1,
                    'Campagne'=>self::OptionC2,
                    'Famille'=>self::OptionC3,
                    'Amenagement'=>self::OptionC4,
                ],
                'choice_attr' => function($choice, $key, $value) {
                    return ['class' => 'qualites_'.strtolower($key)];
                },
                'label' => 'Choisir une condition de vie :',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false
             ])

            ->add('tel', NumberType::class, [
                'attr' => [
                    'label' => 'N°tel :',
                    'placeholder' => 'Votre numéro de téléphone',
                    'class' => 'form-control',
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
                    'class' => 'btn btn-lg mt-3 text-center btnsignin',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
