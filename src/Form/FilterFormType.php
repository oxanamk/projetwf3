<?php

namespace App\Form;

use App\Entity\Announces;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('espece', EntityType::class, [
                'label' => 'Choisir l\'animal  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold m-2',
                    'id' => 'filter_announce_espece'
                ],
                'class' => 'App\Entity\Espece',
                'choice_label' => 'espece',
                'required' => false

            ])
            ->add('couleur', EntityType::class, [
                'label' => 'Choisir la couleur  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold m-2',
                    'id' => 'filter_announce_couleur'
                ],
                'class' => 'App\Entity\Couleur',
                'choice_label' => 'couleur',
                'required' => false
            ])



            ->add('statut', EntityType::class, [
                'label' => 'Choisir le statut  ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold m-2',
                ],
                'class' => 'App\Entity\Statut',
                'choice_label' => 'statut',
                'required' => false
            ])

            ->add('urgent', CheckboxType::class, [
                'label' => 'URGENT',
                'required' => false,
            ])

          
            ->add('departement', TextType::class, [
                'attr' => [
                    'label' => 'Département :',
                    'placeholder' => 'Département',
                    'class' => 'form-control p-3 m-2',
                    'name' => 'departement',
                    'type' => 'departement',
                    'id' => 'departement',

                ],
                'required'=>false,

            ])

            


            ->add(
                'qualites',
                EntityType::class,
                [
                    'label' => 'Choisir vos principales qualités : ',
                    'attr' => [
                        'class' => 'checker text-center font-weight-semibold d-block p-3 m-2',
                        'id' => 'filter_announce_qualites'
                    ],
                    'class' => 'App\Entity\Caracteres',
                    'choice_label' => 'nom_caractere',
                    'expanded' => 'true',
                    'multiple' => 'true',
                    'required' => false

                ]
            )
            ->add('conditions_de_vie', EntityType::class, [
                'label' => 'Choisir des conditions de vies idéales  : ',
                'attr' => [
                    'class' => 'checker text-center font-weight-semibold d-block p-3 m-2',
                    'id' => 'filter_announce_conditions_de_vie'
                ],
                'class' => 'App\Entity\ConditionsVie',
                'choice_label' => 'type',
                'expanded' => 'true',
                'multiple' => 'true',
                'required' => false

            ])


            ->add('submit', SubmitType::class, [
                'attr' => [
                    'label' => 'Publier votre annonce',
                    'class' => 'btn btn-lg mt-3 text-center btnsignup p-3 m-2',
                    'id' => 'filter_announce_submit'
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
