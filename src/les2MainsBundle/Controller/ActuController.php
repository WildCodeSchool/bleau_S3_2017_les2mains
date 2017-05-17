<?php

namespace les2MainsBundle\Controller;

use les2MainsBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ActuController extends Controller
{
    public function indexAction()
    {
        $ajout = new Blog();

        $formBuilder = $this->createFormBuilder($ajout);

        $formBuilder
            ->add('titre',TextType::class)
            ->add('contenu', TextType::class)
            ->add('dates', DateType::class)
            ->add('envoyer',   SubmitType::class);

        $form = $formBuilder->getForm();

        return $this->render('les2MainsBundle:User:actualites.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}