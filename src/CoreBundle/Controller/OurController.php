<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Our;
use CoreBundle\Form\OurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OurController extends Controller
{

    /*public function ourFormAction()
    {
        // On crée un objet Article
        $our_page = new Our();

        // On crée le FormBuilder grâce à la méthode du contrôleur
        $formBuilder = $this->createFormBuilder($our_page);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('titre1',         TextareaType::class)
            ->add('contenu1',    TextareaType::class)
            ->add('save_1',         SubmitType::class)

            ->add('titre2',         TextareaType::class)
            ->add('contenu2',    TextareaType::class)
            ->add('save_2',         SubmitType::class)

            ->add('titre3',         TextareaType::class)
            ->add('contenu3',    TextareaType::class)
            ->add('save_3',         SubmitType::class)
            ;

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('@Core/pages/nous.html.twig', array(
            'form' => $form->createView(),
        ));
    }*/
    public function ourFormAction()
    {
       $em=$this->getDoctrine()->getManager();
       $ourContent=$em->getRepository(Our::class)->myFindSingleOurPage();


       return $this->render('@Core/pages/nous.html.twig', array(
           'our' => $ourContent
       ));
    }


}



    /*public function nousAction()
    {
        $our_page = new Our();

        $formBuilder = $this->createFormBuilder($our_page);

        $formBuilder
            ->add('titre1',         TextareaType::class)
            ->add('contenu1',    TextareaType::class)
            ->add('save_1',         SubmitType::class)

            ->add('titre2',         TextType::class)
            ->add('contenu2',       TextareaType::class)
            ->add('save_2',         SubmitType::class)

            ->add('titre3',         TextareaType::class)
            ->add('contenu3',    TextareaType::class)
            ->add('save_3',         SubmitType::class)
        ;

        $form = $formBuilder->getForm();

        return $this->render('@Core/pages/nous.html.twig', array(
            'form' => $form->createView(),
        ));
    }*/




