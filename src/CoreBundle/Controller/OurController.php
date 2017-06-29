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
    /**
     * Render ourPage and edit it
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ourFormAction(Request $request)
    {
       $em=$this->getDoctrine()->getManager();
       $ourContent = $em->getRepository(Our::class)->myFindSingleOurPage();

       // appel au formulaire se trouvant dans Form/OurType.php
       $form = $this->createForm(OurType::class, $ourContent);
       // Hydratation de l'objet $form avec les elements du Form
       $form->handleRequest($request);


        // Condition qui verifie que nous sommes dans une phase Post
        if ($request->isMethod('post'))
        {
            $em->persist($ourContent);
            $em->flush();
        }

       return $this->render('@Core/pages/nous.html.twig', array(
           'our' => $ourContent,
           'form' => $form->createView()

       ));
    }

}





// Fonction à delete à la fin du Projet SVP

/*public function ourFormAction(Request $request)
{
    $em=$this->getDoctrine()->getManager();
    $ourContent = $em->getRepository(Our::class)->myFindSingleOurPage();

    $form = $this->createForm(OurType::class, $ourContent);
    $form->handleRequest($request);


    //FORM 1
    // On crée le FormBuilder grâce à la méthode du contrôleur
    $formbuilder_1 = $this->get('form.factory')->createNamedBuilder('form_1', 'Symfony\Component\Form\Extension\Core\Type\FormType', $ourContent);
    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formbuilder_1
        ->add('titre1', TextareaType::class)
        ->add('contenu1', TextareaType::class)
        ->add('save_1', SubmitType::class)
        ->add('titre2', TextareaType::class)
        ->add('contenu2', TextareaType::class)
        ->add('save_2', SubmitType::class);

    // À partir du formBuilder, on génère le formulaire
    $form1 = $formbuilder_1->getForm();
    $form1->handleRequest($request);*/

    // FORM 2
    // On crée le FormBuilder grâce à la méthode du contrôleur
    /*$formbuilder_2 = $this->get('form.factory')->createNamedBuilder('form_2', 'Symfony\Component\Form\Extension\Core\Type\FormType', $ourContent);

    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formbuilder_2
        ->add('titre2', TextareaType::class)
        ->add('contenu2', TextareaType::class)
        ->add('save_2', SubmitType::class);

    // À partir du formBuilder, on génère le formulaire
    $form2 = $formbuilder_2->getForm();
    $form2->handleRequest($request);

    if ($request->isMethod('post'))
    {
        $em->persist($ourContent);
        $em->flush();
    }

    return $this->render('@Core/pages/nous.html.twig', array(
        'our' => $ourContent,
        'form' => $form->createView()

    ));*/






