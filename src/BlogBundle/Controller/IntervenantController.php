<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Intervenant;
use BlogBundle\Form\IntervenantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class IntervenantController extends Controller
{
    public function indexAction(Request $request)
    {
        // Init i for paralax in view
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


}
