<?php

namespace App\Form;

use App\Entity\Libre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_seance')
            ->add('heure_debut')
            ->add('heure_fin')
            ->add('nb_activite')
            ->add('activites')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Libre::class,
        ]);
    }
}
