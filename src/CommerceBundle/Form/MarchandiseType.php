<?php

namespace CommerceBundle\Form;

use CommerceBundle\Entity\Category;
use CommerceBundle\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
        $builder->add('prix', NumberType::class)
                ->add('quantite', IntegerType::class)
                ->add('unite', TextType::class, array(
                    'required' => false
                ))
		        ->add('categorie', EntityType::class, array(
		            'class' => Category::class,
			        'choice_label' => 'type',
			        'placeholder' => 'Selectionnez une catégorie',
			        'required' => false
		        ))
                ->add('product', EntityType::class, array(
                	'class' => Product::class,
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
