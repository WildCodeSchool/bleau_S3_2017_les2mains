<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Activite;
use CoreBundle\Entity\ActiviteType;
use CoreBundle\Form\ActiviteTypeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiviteController extends Controller
{
    /**
     * Listing All Themes of ActivityType
     * @return Response
     */
    public function listAllThemesAction(){
        $em = $this->getDoctrine()->getManager();

        $listthemes = $em->getRepository(\CoreBundle\Entity\ActiviteType::class)->findAll();

        return $this->render('@Core/pages/activite/listAllThemes.html.twig', array(
            'listthemes' => $listthemes,
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function addAction(Request $request)
    {
        // Init i for parallax in view activity
        $i = 0;

        $em = $this->getDoctrine()->getManager();

        $themes = $em->getRepository(\CoreBundle\Entity\ActiviteType::class)->getActivitiesType();

        $activite = new Activite();
        $form = $this->createForm(\CoreBundle\Form\ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('core_activite_add');
        }

        $activitetype = new ActiviteType();
        $forms = $this->createForm(ActiviteTypeType::class, $activitetype);
        $forms ->handleRequest($request);

        if ($forms->isSubmitted() && $forms->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activitetype);
            $em->flush();

        return $this->redirectToRoute('core_activite_add');
        }

        return $this->render('@Core/pages/activite/addActivite.html.twig', array(
            'i' => $i,
            'themes' => $themes,
            'form' => $form->createView(),
            'forms' => $forms->createView(),

        ));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function editActiviteAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $idActivite = $request->request->get('idElem');
            $activite = $em->getRepository(Activite::class)->findOneById($idActivite);
            $form = $this->generateActivityForm($activite);
            $form->handleRequest($request);

            return $this->render('@Core/pages/activite/editActivite.html.twig', array(
                'activite_selected' => $activite,
                'form' => $form->createView()
            ));
        }
    }

    /**
     * @param Activite $activite
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function valideEditAction(Activite $activite, Request $request)
    {
        $form = $this->generateActivityForm($activite);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($activite);
        $em->flush();

        return $this->redirectToRoute('core_activite_add');
    }

    /**
     * @param $object
     * @return \Symfony\Component\Form\FormInterface
     */
    private function generateActivityForm($object){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $object->getId(), \CoreBundle\Form\ActiviteType::class, $object);
        $formBuilder->setAction($this->generateUrl('core_activite_editValide', array(
            'id' => $object->getId()
        )));

        $form = $formBuilder->getForm();
        return $form;
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

    /**
     * Delete one theme with ajax and all there activities
     * @param Request $request
     * @return Response
     */
    public function deleteThemeAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $id = $request->request->get('idTheme');

            $theme = $em->getRepository('CoreBundle:ActiviteType')->findOneById($id);

            $em->remove($theme);
            $em->flush();

            return new Response('Le thème ' . $theme->getNom() . ' ainsi que toutes ses activitées ont bien été supprimés');
        }

        return new Response('Une erreur est survenue, veuillez réessayer');
    }
}