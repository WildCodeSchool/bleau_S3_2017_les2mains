<?php

namespace CommerceBundle\Controller;



use CommerceBundle\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ActiviteController extends Controller
{


    public function ActiviteAction()
    {
        return $this->render('@Commerce/activite.html.twig');
    }



   public function ActiviteaddAction(Request $request)
  {
      $activite = new Activite();
      $form = $this->createForm('CommerceBundle\Form\ActiviteType', $activite);
      $form->handleRequest($request);

      if ($form->isValid() && $form->isSubmitted()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($activite);
          $em->flush();

          return $this->redirectToRoute('activite');
      }

        return $this->render('@Commerce/activite.html.twig', array(
            'form' => $form->createView(),
        ));

   }

}