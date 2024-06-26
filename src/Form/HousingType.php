<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Housing;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HousingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surface')
            ->add('urlRent')
            ->add('keybox')
            ->add('arrivalTime', null, [
                'widget' => 'single_text',
            ])
            ->add('departureTime', null, [
                'widget' => 'single_text',
            ])
            ->add('address', EntityType::class, [
                'class' => Address::class,
                'choice_label' => 'id',
            ])
            ->add('owner', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Housing::class,
        ]);
    }
}
