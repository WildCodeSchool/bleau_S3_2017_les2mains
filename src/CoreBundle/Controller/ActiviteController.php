<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Activite;
use CoreBundle\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends Controller
{
    /**
     * Render page for sho allActivities and add new Activity
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $themes = $em->getRepository(\CoreBundle\Entity\ActiviteType::class)->findAll();

        $activite = new Activite();
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('core_activite_add');
        }

        return $this->render('@Core/pages/activite/addActivite.html.twig', array(
            'themes' => $themes,
            'form' => $form->createView(),
        ));
    }

    /**
     * Render form for EditActivity
     * Call directly in template with renderController method
     * @param Request $request
     * @param Activite $activite
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editActiviteAction(Request $request, Activite $activite)
    {
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $activite->getId(), ActiviteType::class, $activite);
        $formBuilder->setAction($this->generateUrl('core_activite_editValide', array(
            'id' => $activite->getId()
        )));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        return $this->render('@Core/pages/activite/editActivite.html.twig', array(
            'form'  => $form->createView()
        ));

    }

    /**
     * Validat form edit Activity
     * @param Activite $activite
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function valideEditAction(Activite $activite, Request $request){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $activite->getId(),ActiviteType::class, $activite);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($activite);
        $em->flush();

        return $this->redirectToRoute('core_activite_add');
    }

    /**
     * Delete one activity
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('CoreBundle:Activite')->findOneById($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('core_activite_add');
    }
}