<?php

namespace BlogBundle\Form;

use CoreBundle\Form\PictureType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['data']->getId() == null){
            $builder
                ->add('picture', PictureType::class, array(
                    'label' => false,
                    'required' => true
                ));

        }

        else {
            $builder
                ->add('picture', PictureType::class, array(
                    'label' => false,
                    'required' => false
                ));

        }
        $builder
            ->add('titre', TextType::class)
            ->add('contenu', TextareaType::class)
            ->add('lien', TextareaType::class, array('required' => false))
            ->add('submit', SubmitType::class, array('label'=>'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_article';
    }


}
