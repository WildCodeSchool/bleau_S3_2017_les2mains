<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
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
        $builder->add('titre1',         TextType::class)
                ->add('contenu1',    TextareaType::class)

                ->add('picture1', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture2', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture3',PictureType::class,array(
                    'required'=> false
                ))
                ->add('save_1',         SubmitType::class, array('label' => 'Valider'))

                ->add('titre2', TextType::class)
                ->add('contenu2', TextareaType::class)

                ->add('picture4', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture5', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture6', PictureType::class,array(
                    'required'=> false
                ))
                ->add('save_2', SubmitType::class, array('label' => 'Valider'))

                ->add('titre3', TextType::class)
                ->add('contenu3', TextareaType::class)

                ->add('picture7', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture8', PictureType::class,array(
                    'required'=> false
                ))
                ->add('picture9', PictureType::class,array(
                    'required'=> false
                ))
                ->add('save_3', SubmitType::class, array('label' => 'Valider'))
            ->getForm();

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Our'
        ));
    }

    public function getBlockPrefix()
    {
        return 'Corebundle_nous';
    }

}