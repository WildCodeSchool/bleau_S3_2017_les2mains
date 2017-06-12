<?php

namespace CommerceBundle\Controller;



use CommerceBundle\Form\ActiviteType;
use CoreBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ActiviteController extends Controller
{
   public function ActiviteAction(Request $request)
  {
      $activite = new Activite();
      $form = $this->createForm('CommerceBundle\Form\ActiviteType', $activite);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid())
      {
          $em = $this->getDoctrine()->getManager();
          $em->persist($activite);
          $em->flush();

          return $this->redirectToRoute('activite');
      }

        return $this->render('@Commerce/activite.html.twig', array(
            'activite' => $activite,
            'activites' => array(),
            'form' => $form->createView(),
        ));

   }

}