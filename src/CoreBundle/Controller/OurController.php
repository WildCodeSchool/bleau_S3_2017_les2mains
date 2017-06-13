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

    public function ourFormAction(Request $request)
    {
       $em=$this->getDoctrine()->getManager();
       $ourContent=$em->getRepository(Our::class)->myFindSingleOurPage();

        // On crée le FormBuilder grâce à la méthode du contrôleur
        $formbuilder = $this->createFormBuilder($ourContent);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formbuilder
            ->add('titre1', TextareaType::class)
            ->add('contenu1', TextareaType::class)
            ->add('save_1', SubmitType::class);

        // À partir du formBuilder, on génère le formulaire
        $form1 = $formbuilder->getForm();
        $form1->handleRequest($request);

        // On vérifie qu'elle est de type POST
        if( $request->isMethod('post'))
        {
            $em->persist($ourContent);
            $em->flush();
        }


       return $this->render('@Core/pages/nous.html.twig', array(
           'our' => $ourContent,
           'form1' => $form1->createView()
       ));
    }


}







