<?php

namespace App\Form;

use App\Entity\Bien;
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

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_type',EntityType::class, array('class'=>'App\Entity\Type', 'choice_label'=>'libelle', 'placeholder'=>'id_type'))
            ->add('nb_piece',NumberType::class, array('label'=>'nb_piece:','attr'=>array('class'=>'form-control', 'placeholder'=>'nb_piece')))
            ->add('nb_chambre',NumberType::class, array('label'=>'nb_chambre:','attr'=>array('class'=>'form-control', 'placeholder'=>'nb_chambre')))
            ->add('superficie',NumberType::class, array('label'=>'superficie:','attr'=>array('class'=>'form-control', 'placeholder'=>'superficie')))
            ->add('prix',NumberType::class, array('label'=>'prix:','attr'=>array('class'=>'form-control', 'placeholder'=>'prix')))
            ->add('chauffage',TextType::class, array('label'=>'chauffage:','attr'=>array('class'=>'form-control', 'placeholder'=>'chauffage')))
            ->add('annee',TextType::class, array('label'=>'annee:','attr'=>array('class'=>'form-control', 'placeholder'=>'annee')))
            ->add('localisation',TextType::class, array('label'=>'localisation:','attr'=>array('class'=>'form-control', 'placeholder'=>'localisation')))
            ->add('etat',TextType::class, array('label'=>'état:','attr'=>array('class'=>'form-control', 'placeholder'=>'état')))
            
            ->add('Valider',SubmitType::class, array('label'=>'Valider','attr'=>array('class'=>'btn btn-primary btn-block'))) 
            ->add('annuler',ResetType::class, array('label'=>'Quitter','attr'=>array('class'=>'btn btn-primary btn-block')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
