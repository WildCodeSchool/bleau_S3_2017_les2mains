<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Our;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OurController extends Controller
{
    public function nousAction()
    {
        $our_page = new Our();

        $formBuilder = $this->createFormBuilder($our_page);

        $formBuilder
            ->add('titre1',         TextType::class)
            ->add('titre2',         TextType::class)
            ->add('titre3',         TextType::class)
            ->add('contenu1',    TextareaType::class)
            ->add('contenu2',    TextareaType::class)
            ->add('contenu3',    TextareaType::class)
            ->add('save',         SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        return $this->render('@Core/pages/nous.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}