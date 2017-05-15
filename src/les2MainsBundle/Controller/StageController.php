<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StageController extends Controller
{
    public function stageAction()
    {
        return $this->render('@les2Mains/User/nos_stages.html.twig');
    }

    public function addAction(Request $request){

        $stage = new Stage();
        $form = $this->CreateForm('les2MainsBundles\Form\stageType', $stage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stage);
            $em->flush();

            return $this->redirectToRoute('les2_mains');
        }
        return $this->render('@les2Mains/stage.html.twig',
            array('form' => $form->createView(),
            ));
    }
}