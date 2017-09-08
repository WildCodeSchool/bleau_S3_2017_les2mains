<?php

//src/CommerceBundle/Form/CustomType/FloatType.php

namespace CommerceBundle\Form\CustomType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FloatType extends AbstractType
{
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'attr' => array(
				'step' => "any"
			),
			"scale" => 2,
			"rounding_mode" => IntegerToLocalizedStringTransformer::ROUND_DOWN
		));
	}

	public function getParent()
	{
		return NumberType::class;
	}
}