<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Activite;
use CoreBundle\Form\ActiviteType;
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

    public function editActiviteAction(Request $request, Activite $activite)
    {

        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $activite->getId(), ActiviteType::class, $activite);
        $formBuilder->setAction($this->generateUrl('core_activite_editValide', array(
            'id' => $activite->getId()
        )));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        return $this->render('@Core/pages/activite/editActivite.html.twig', array(
            'article_selected' => $activite,
            'form'  => $form->createView()
        ));

    }

    public function valideEditAction(Activite $activite, Request $request){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $activite->getId(),ActiviteType::class, $activite);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($activite);
        $em->flush();

        return $this->redirectToRoute('core_activite_add');
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('CoreBundle:Activite')->findOneById($id);
        $em->remove($activite);
        $em->flush();


        return $this->redirectToRoute('core_activite_add');
    }


}