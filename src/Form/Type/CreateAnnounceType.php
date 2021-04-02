<?php

namespace App\Form\Type;

use App\Entity\Announces;
use App\Entity\Caracteres;
use App\Entity\ConditionsVie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateAnnounceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('age')
            ->add('image')
            ->add('description')
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
            ->add('submit', SubmitType::class, [
                'label' => 'Publier votre annonce'
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
