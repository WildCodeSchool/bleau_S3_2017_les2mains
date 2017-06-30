<?php

namespace CommerceBundle\Form;

use CoreBundle\Form\PictureType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class,array('label' => 'Nom du Produit'))
            ->add('content', TextareaType::class,array('label' => 'Description'))
            ->add('categories', EntityType::class, array(
                'class' => 'CommerceBundle\Entity\Category',
                'choice_label' => 'type',
                'label' => " "
            ))
            ->add('picture', PictureType::class, array(
                'label' => ' '
            ))
            ->add('submit', SubmitType::class,array('label' => 'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CommerceBundle\Entity\Product'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commercebundle_product';
    }


}
