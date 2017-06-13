<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository(Activite::class)->findAll();

        return $this->render('@Core/pages/activite/activite.html.twig', array(
            'activites' => $activite
        ));
    }

    public function addAction(Request $request)
    {
        $activite = new Activite();
        $form = $this->createForm('CoreBundle\Form\ActiviteType', $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('core_activite');

        }

        return $this->render('@Core/pages/activite/addActivite.html.twig', array(
            'activite' => $activite,
            'form' => $form->createView(),
        ));
    }

}