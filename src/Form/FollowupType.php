<?php

namespace App\Form;

use App\Entity\Followup;
use App\Entity\Housing;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class FollowupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Qu avez vous effectué ? ',
                'required' => true,
                'empty_data' => '',
                'attr' => ['class'=>"block w-full rounded-md border-0 py-1.5 text-gold shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
                'sanitize_html' => true,
            ])
            ->add('createAt', null, [
                'label' => 'Quand ? ',
                'widget' => 'single_text',
                //'widget' => 'choice',
                'attr' => ['class'=>"block w-full rounded-md border-0 py-1.5 text-gold shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Infos complémentaires ',
                'required' => true,
                'empty_data' => '',
                'attr' => ['class'=>"block w-full rounded-md border-0 py-1.5 text-gold shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
                'sanitize_html' => true,
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Saisir le montant ',
                'empty_data' => '',
                'attr' => ['class'=>"block w-full rounded-md border-0 py-1.5 text-gold shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
            ])
            ->add('cleaner', EntityType::class, [
                'class' => User::class,
                'label' => 'Qui s en occupe ? ',
                'choice_label' => 'firstname',
                // Choix affichage dropdown
                // 'multiple' => false,
                // 'expanded' => true,
                //ça cherche selon ce qu'on tape / moteur de recherche
                'autocomplete' => true,
                //'filter_query' => false
                
                // function(QueryBuilder $qb, string $query, UserRepository $ur) {
                //     if (!$query) {
                //         return;
                //     }
            
                //     $qb->andWhere('user.roles = ROLE_ADMIN ');
                // },
                'empty_data' => '',
                'attr' => ['class'=>"block w-full rounded-md border-0 py-1.5 text-gold shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
            ])
            ->add('housing', EntityType::class, [
                'class' => Housing::class,
                'label' => 'Quel location ?',
                'choice_label' => 'name',
                'autocomplete' => true,
                'empty_data' => '',
                'attr' => ['class'=>"block 
                w-full rounded-md border-0 py-1.5 
                text-gold shadow-sm ring-1 ring-inset 
                ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset 
                focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],
            ])
            ->add('valider', SubmitType::class, [
                'attr' => ['class'=>"rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-gold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Followup::class,
        ]);
    }
}
