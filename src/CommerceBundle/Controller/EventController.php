<?php

namespace CommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    // TODO: Generate entity
    public function EventAction()
    {
        return $this->render('@Commerce/nos_events.html.twig');
    }

    public function addAction(Request $request){

//        $stage = new Event();
//        $formBuilder = $this->createFormBuilder($stage);
//
//        $formBuilder
//            ->add('dates_debut', DateTimeType::class)
//            ->add('dates_fin', DateTimeType::class)
//            ->add('prix', IntegerType::class)
//            ->add('Descriptions', TextareaType::class)
//        ;
//
//        $form =$formBuilder->getForm();
//
//
//

        return $this->render('@Commerce/nos_events.html.twig');
    }

}
