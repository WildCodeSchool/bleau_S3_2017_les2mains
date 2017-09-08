<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Intervenant;
use BlogBundle\Form\IntervenantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IntervenantController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function indexAction(Request $request)
    {
        $i = 0;

        $em = $this->getDoctrine()->getManager();
        $intervenants = $em->getRepository('BlogBundle:Intervenant')->findBy(array(), array('id' => 'DESC'));

        $intervenant = new Intervenant();
        $form = $this->createForm(IntervenantType::class, $intervenant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($intervenant);
            $em->flush();

            return $this->redirectToRoute('blog_intervenant');
        }

        return $this->render('@Blog/intervenants.html.twig', array(
            'intervenants' => $intervenants,
            'i' => $i,
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function editIntervenantAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $idInter = $request->request->get('idElem');
            $intervenant = $em->getRepository(Intervenant::class)->findOneById($idInter);
            $form = $this->generateIntervenantForm($intervenant);
            $form->handleRequest($request);

            return $this->render('@Blog/editActu.html.twig', array(
                'article_selected' => $intervenant,
                'form' => $form->createView()
            ));
        }
    }

    /**
     * @param Intervenant $intervenant
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function validEditAction(Intervenant $intervenant, Request $request)
    {
        $form = $this->generateIntervenantForm($intervenant);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($intervenant);
        $em->flush();

        return $this->redirectToRoute('blog_intervenant');
    }

    /**
     * @param $object
     * @return \Symfony\Component\Form\FormInterface
     */
    private function generateIntervenantForm($object){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $object->getId(), IntervenantType::class, $object);
        $formBuilder->setAction($this->generateUrl('blog_intervenant_editValide', array(
            'id' => $object->getId()
        )));

        $form = $formBuilder->getForm();
        return $form;
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $intervenant = $em->getRepository('BlogBundle:Intervenant')->findOneById($id);
        $em->remove($intervenant);
        $em->flush();

        return $this->redirectToRoute('blog_intervenant');
    }

}
