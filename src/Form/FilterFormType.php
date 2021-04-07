<?php

namespace App\Form\Type;

use App\Entity\Announces;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterAnnounceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('espece', EntityType::class, [
                'label' => 'Choisir l\'animal  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold',
                ],
                'class' => 'App\Entity\Espece',
                'choice_label' => 'espece',
                'required'=> false

            ])
            ->add('couleur', EntityType::class, [
                'label' => 'Choisir la couleur  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold',
                ],
                'class' => 'App\Entity\Couleur',
                'choice_label' => 'couleur',
                'required'=> false
            ])


            ->add('statut', EntityType::class, [
                'label' => 'Choisir le statut  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold',
                ],
                'class' => 'App\Entity\Statut',
                'choice_label' => 'statut',
                'required'=> false
           ])

            ->add('date', DateType::class, [
                'format' => 'dd/MM/yyyy',
                'required'=> false

            ])

            ->add(
                'qualites',
                EntityType::class,
                [
                    'label' => 'Choisir vos principales qualités : ',
                    'attr' => [
                        'class' => 'checker text-center font-weight-semibold',
                    ],
                    'class' => 'App\Entity\Caracteres',
                    'choice_label' => 'nom_caractere',
                    'expanded' => 'true',
                    'multiple' => 'true',
                    'required'=> false

                ]
            )
            ->add('conditions_de_vie', EntityType::class, [
                'label' => 'Choisir des conditions de vies idéales  : ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold',
                ],
                'class' => 'App\Entity\ConditionsVie',
                'choice_label' => 'type',
                'expanded' => 'true',
                'multiple' => 'true',
                'required'=> false

            ])


            ->add('submit', SubmitType::class, [
                'attr' => [
                    'label' => 'Publier votre annonce',
                    'class' => 'btn btn-lg mt-3 text-center btnsignup',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
