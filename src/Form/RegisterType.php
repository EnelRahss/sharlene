<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\File;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class, [
            'label' => 'Saisir votre nom',
            'required' => true,
            'empty_data' => '',
            'attr' => ['class'=>"block 
                w-full rounded-md border-0 py-1.5 
                text-gold shadow-sm ring-1 ring-inset 
                ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset 
                focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],

            'sanitize_html' => true,
        ])
        ->add('firstname', TextType::class, [
            'label' => 'Saisir votre prénom',
            'required' => true,
            'empty_data' => '',
            'attr' => ['class'=>"block 
                w-full rounded-md border-0 py-1.5 
                text-gold shadow-sm ring-1 ring-inset 
                ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset 
                focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],

            'sanitize_html' => true,
        ])
        ->add('email', EmailType::class, [
            'label' => 'Saisir votre email',
            'required' => true,
            'empty_data' => '',
            'attr' => ['class'=>"block 
                w-full rounded-md border-0 py-1.5 
                text-gold shadow-sm ring-1 ring-inset 
                ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset 
                focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],

        ])
        ->add('password', PasswordType::class, [
            'label' => 'Saisir votre mot de passe',
            'required' => true,
            'empty_data' => '',
            'attr' => ['class'=>"block 
                w-full rounded-md border-0 py-1.5 
                text-gold shadow-sm ring-1 ring-inset 
                ring-gray-300 placeholder:text-gold focus:ring-2 focus:ring-inset 
                focus:ring-indigo-600 sm:text-sm sm:leading-6"],
                'label_attr' => ['class'=>"block text-sm font-medium leading-6 text-gold"],

        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
