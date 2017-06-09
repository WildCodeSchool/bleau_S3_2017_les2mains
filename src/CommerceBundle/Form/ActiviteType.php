<?php

namespace CommerceBundle\Form;





use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActiviteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function builderForm(FormBuilderInterface $builder, array $option)
    {
        $builder
            ->add('rubrique', TextType::class)
            ->add('titre', TextType::class)
            ->add('contenu', TextType::class)
            ->add('picture', PictureType::class)
            ->add('lien', LinkType::class)
            ->add('submit', SubmitType::class);
    }
}