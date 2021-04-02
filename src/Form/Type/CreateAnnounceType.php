<?php

namespace App\Form\Type;

use App\Entity\Announces;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAnnounceType extends AbstractType
{
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
            ->add('image')
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
            ->add('qualites', EntityType::class, [
                'class' => 'App\Entity\Caracteres',
                'choice_label' => 'nom_caractere',
                'expanded' => 'true',
                'multiple'=>'true'])
            ->add('conditions_de_vie', EntityType::class, [
                'class' => 'App\Entity\ConditionsVie',
                'choice_label' => 'type',
                'expanded' => 'true',
                'multiple'=>'true'
            ])
            ->add('', TextareaType::class, [
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
            'data_class' => Announces::class,
        ]);
    }
}
