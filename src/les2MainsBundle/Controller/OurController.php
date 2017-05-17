<?php

namespace les2MainsBundle\Controller;

use les2MainsBundle\Entity\Nous;
use les2MainsBundle\Form\OurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OurController extends Controller
{
    public function nousAction()
    {
        $ajout = new Nous();

        $formBuilder = $this->createFormBuilder($ajout);

        $formBuilder
            ->add('titre',         TextType::class)
            ->add('contenu',    TextType::class)
            ->add('save',         SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        return $this->render('@les2Mains/User/nous.html.twig', array(
            'form' => $form->createView(),
        ));
    }

   public function addAction()
    {
        $ajout = new Nous();

        $formBuilder = $this->createFormBuilder($ajout);

        $formBuilder
            ->add('titre',         TextType::class)
            ->add('contenu',    TextType::class)
            ->add('save',         SubmitType::class)
        ;


        $form = $formBuilder->getForm();


        return $this->render('@les2Mains/User/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }+

}