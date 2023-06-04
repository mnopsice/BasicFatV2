<?php

namespace App\Form;

use App\Entity\Collective;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectiveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_seance')
            ->add('heure_debut')
            ->add('heure_fin')
            ->add('nb_places')
            ->add('nb_personnes')
            ->add('activites')
            ->add('coachs')
            ->add('adherents')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collective::class,
        ]);
    }
}
