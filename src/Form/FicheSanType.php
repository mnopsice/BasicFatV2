<?php

namespace App\Form;

use App\Entity\FicheSan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheSanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('poids')
            ->add('taille')
            ->add('histo_sante')
            ->add('histo_seance')
            ->add('adherents')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheSan::class,
        ]);
    }
}
