<?php

namespace CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ActiviteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activiteType', EntityType::class, array(
                'class' => 'CoreBundle\Entity\ActiviteType',
                'choice_label' => 'nom',
                'label' => ' '))
                ->add('titre', TextType::class)
                ->add('contenu', TextareaType::class)
                ->add('picture', PictureType::class, array(
                'label' => ' '))
                ->add('lien',TextType::class, array(
                    'required' => false
                ))
                ->add('submit', SubmitType::class, array('label'=>'Créer'));
        


    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Activite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_activite';
    }


}
