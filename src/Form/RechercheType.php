<?php

namespace App\Form;

use App\Entity\Announces;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('espece', EntityType::class, [
            'label' => 'Choisir l\'animal  ',
            'attr' => [
                'class' => 'text-center font-weight-semibold form-control',
                'id' => 'filter_announce_espece'
            ],
            'class' => 'App\Entity\Espece',
            'choice_label' => 'espece',
            'required' => false

        ])
        ->add('ville', TextType::class,[
            'attr' => [
                'label' => 'Ville :',
                'placeholder' => 'Ville',
                'class' => 'form-control',
                'name' => 'ville',
                'type' => 'ville',
                'id' => 'ville',
                'required'
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
