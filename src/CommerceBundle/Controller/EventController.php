<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Event;
use CommerceBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{

    public function addEventAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('CommerceBundle:Event')->findAll();

        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_add');
        }

        return $this->render('@Commerce/nos_events.html.twig', array(
           'form' =>$form->createView(),
            'event' => $event,
            'events' => $events
        ));


    }

    public function deleteEventAction($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('CommerceBundle:Event')->findOneById($id);
        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('event_add');

    }

    private function generateEventForm($object){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $object->getId(), EventType::class, $object);
        $formBuilder->setAction($this->generateUrl('event_edit_valid', array(
            'id' => $object->getId()
        )));

        $form = $formBuilder->getForm();
        return $form;
    }

    public function editEventAction(Event $event, Request $request){
        $form = $this->generateEventForm($event);
        $form->handleRequest($request);

        return $this->render('@Commerce/editEvent.html.twig', array(
            'event_selected' => $event,
            'form' => $form->createView()
        ));
    }

    public function validEditAction(Event $event, Request $request){
        $form = $this->generateEventForm($event);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return $this->redirectToRoute('event_add');

    }

}
