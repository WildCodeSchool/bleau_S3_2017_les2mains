<?php

//src/CommerceBundle/Form/CustomType/FloatType.php

namespace CommerceBundle\Form\CustomType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class FloatType extends AbstractType
{
	public function getParent()
	{
		return NumberType::class;
	}
}