<?php

namespace App\Form;

use App\Entity\Mission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Terme;
use App\Entity\Site;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\SiteType;
use App\Form\RapportType;

class MissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_debut', DateType::class,['widget' => 'single_text', 'html5' => false,'attr'=>[
            'class'=>'datepicker1'
            ]])
            ->add('date_fin', DateType::class,['widget' => 'single_text', 'html5' => false,'attr'=>[
            'class'=>'datepicker2'
            ]])
            ->add('nom')
            ->add('user_client')
            ->add('user',EntityType::class, [
            'class' => User::class,
            'multiple' => true,
            'choice_label' => 'username',])
            ->add('rapport',RapportType::class)
    
            ->add('site', SiteType::class)

            ->add('terme',EntityType::class, [
            'class' => Terme::class,
            'multiple' => true,
            'choice_label' => 'terme',]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mission::class,
        ]);
    }
}
