<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Our;
use les2MainsBundle\Form\OurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    /*public function nousAction(Request $request)
    {
        $our = new Our();

        $form =$this->createForm(Our::class , $our);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($our);
            $em->flush();

            return $this->redirectToRoute('core_nous');
        }
        return $this->render('@Core/pages/nous.html.twig', array (
            'form' => $form->createView()

        ));

    }*/
}
