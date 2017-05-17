<?php

namespace les2MainsBundle\Controller;

use les2MainsBundle\Entity\Events;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class EventsController extends Controller
{
    public function eventsAction()
    {
        return $this->render('@les2Mains/User/nos_events.html.twig');
    }

    public function addAction(Request $request){

        $stage = new Events();
        $formBuilder = $this->createFormBuilder($stage);

        $formBuilder
            ->add('dates_debut', DateTimeType::class)
            ->add('dates_fin', DateTimeType::class)
            ->add('prix', IntegerType::class)
            ->add('Descriptions', TextareaType::class)
        ;

        $form =$formBuilder->getForm();




        return $this->render('@les2Mains/User/nos_events.html.twig',
            array('form' => $form->createView(),
            ));
    }

}
