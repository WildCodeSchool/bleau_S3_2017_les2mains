<?php

namespace les2MainsBundle

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


use Symfony\Component\HttpFoundation\Request;

class OurType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class)
                ->add('contenu', TextType::class)
                ->add('dates', DateType::class)
                ->add('envoyer',   SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'les2MainsBundle\les2MainsBundle'
        ));
    }


    public function getBlockPrefix()
    {
        return 'les2Mainsbundle_actu';
    }
}