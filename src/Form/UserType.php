<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Fonction;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            // ->add('roles')
            ->add('username')
            ->add('enabled')
            ->add('fonction',EntityType::class, [
            'class' => Fonction::class,
            'placeholder' => '',
            'required' => false,
            'choice_label' => 'terme',])
            // ->add('avatar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
