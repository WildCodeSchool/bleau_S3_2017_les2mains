<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ActuController extends Controller
{
    public function indexAction()
    {
        $article = new Article();

        $formBuilder = $this->createFormBuilder($article);

        $formBuilder
            ->add('titre',TextType::class)
            ->add('contenu', TextType::class)
            ->add('date', DateType::class)
            ->add('envoyer',   SubmitType::class);

        $form = $formBuilder->getForm();

        return $this->render('@Blog/actualites.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}