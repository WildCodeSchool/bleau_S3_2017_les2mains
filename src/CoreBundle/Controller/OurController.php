<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Our;
use CoreBundle\Form\OurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OurController extends Controller
{
    /**
     * Render ourPage and edit it
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ourFormAction(Request $request)
    {
       $em=$this->getDoctrine()->getManager();
       $ourContent = $em->getRepository(Our::class)->myFindSingleOurPage();

       // appel au formulaire se trouvant dans Form/OurType.php
       $form = $this->createForm(OurType::class, $ourContent);
       // Hydratation de l'objet $form avec les elements du Form
       $form->handleRequest($request);


        // Condition qui verifie que nous sommes dans une phase Post
        if ($request->isMethod('post'))
        {
            $em->persist($ourContent);
            $em->flush();
        }

       return $this->render('@Core/pages/nous.html.twig', array(
           'our' => $ourContent,
           'form' => $form->createView()

       ));
    }

}


