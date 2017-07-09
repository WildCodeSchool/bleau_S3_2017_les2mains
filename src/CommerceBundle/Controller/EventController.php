<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Event;
use CommerceBundle\Form\EventType;
use CoreBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addEventAction(Request $request)
    {
        $i = 0;

        $em = $this->getDoctrine()->getManager();
        $activities = $em->getRepository(Activite::class)->getActivities();

        $event = new Event();
        $form = $this->createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_add');
        }

        return $this->render('@Commerce/user/nos_events.html.twig', array(
           'form' =>$form->createView(),
            'event' => $event,
            'activities' => $activities,
            'i' => $i
        ));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteEventAction($id){
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('CommerceBundle:Event')->findOneById($id);
        $em->remove($event);
        $em->flush();

        return $this->redirectToRoute('event_add');
    }

    /**
     * @param $object
     * @return \Symfony\Component\Form\FormInterface
     */
    private function generateEventForm($object){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $object->getId(), EventType::class, $object);
        $formBuilder->setAction($this->generateUrl('event_edit_valid', array(
            'id' => $object->getId()
        )));

        $form = $formBuilder->getForm();
        return $form;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editEventAction(Request $request){
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $idEvent = $request->request->get('idEvent');
            $event = $em->getRepository(Event::class)->findOneById($idEvent);
            $form = $this->generateEventForm($event);
            $form->handleRequest($request);

            return $this->render('@Commerce/user/editEvent.html.twig', array(
                'event_selected' => $event,
                'form' => $form->createView()
            ));
        }
    }

    /**
     * @param Event $event
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function validEditAction(Event $event, Request $request){
        $form = $this->generateEventForm($event);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return $this->redirectToRoute('event_add');
    }
}
