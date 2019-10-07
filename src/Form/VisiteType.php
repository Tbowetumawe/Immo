<?php

namespace App\Form;

use App\Entity\Visite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_date',NumberType::class, array('label'=>'id_date:','attr'=>array('class'=>'form-control', 'placeholder'=>'id_date')))
            ->add('suite',TextType::class, array('label'=>'suite:','attr'=>array('class'=>'form-control', 'placeholder'=>'suite')))
            ->add('idBien',EntityType::class, array('label'=>'idBien:','attr'=>array('class'=>'form-control', 'placeholder'=>'idBien')))
            ->add('id_visiteur',EntityType::class, array('label'=>'id_visiteur:','attr'=>array('class'=>'form-control', 'placeholder'=>'id_visiteur')))
            ->add('Valider',SubmitType::class, array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn-block'))) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visite::class,
        ]);
    }
}
