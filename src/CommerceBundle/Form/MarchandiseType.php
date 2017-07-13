<?php

namespace CommerceBundle\Form;

use CommerceBundle\Entity\Evenement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarchandiseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prix', IntegerType::class)
                ->add('quantite', IntegerType::class)
                ->add('unite', TextType::class, array(
                    'required' => false
                ))
                ->add('product',EntityType::class, array(
                    'class' => 'CommerceBundle\Entity\Product',
                    'choice_label' => 'name'
                ))
	            ->add('submit', SubmitType::class, array(
                    'label' => 'Valider'
                ))
        ;

    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CommerceBundle\Entity\Marchandise'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commercebundle_marchandise';
    }


}
