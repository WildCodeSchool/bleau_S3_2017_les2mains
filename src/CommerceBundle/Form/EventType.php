<?php

namespace CommerceBundle\Form;

use CoreBundle\Form\PictureType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('dateStart', DateTimeType::class)
            ->add('dateEnd', DateTimeType::class)
            ->add('location', TextType::class)
            ->add('price', IntegerType::class)
            ->add('available_places', IntegerType::class)
            ->add('activite', EntityType::class, array(
                'class'=>'CoreBundle\Entity\Activite',
                'choice_label' => 'titre'))
            ->add('picture', PictureType::class)
            ->add('submit', SubmitType::class, array('label'=>'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CommerceBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commercebundle_event';
    }


}
