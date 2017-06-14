<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends Controller
{


    public function addAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository(Activite::class)->findAll();

        $activite = new Activite();
        $form = $this->createForm('CoreBundle\Form\ActiviteType', $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('core_activite_add');

        }

        return $this->render('@Core/pages/activite/addActivite.html.twig', array(
            'activite' => $activite,
            'activites' => $activites,
            'form' => $form->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('CoreBundle:Activite')->myFindOneById($id);
        $em->remove($activite);
        $em->flush();


        return $this->redirectToRoute('core_activite_delete', array('id' => $id));
    }


}