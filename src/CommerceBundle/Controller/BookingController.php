<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Evenement;
use CommerceBundle\Entity\Lieu;
use CommerceBundle\Entity\Marchandise;
use CommerceBundle\Entity\Product;
use CommerceBundle\Form\EvenementType;
use CommerceBundle\Form\LieuType;
use CommerceBundle\Form\MarchandiseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookingController extends Controller
{
    public function addBookingAction(Request $request)
    {
        $date = new Evenement();
        $formdate = $this->createForm(EvenementType::class, $date);
        $formdate->handleRequest($request);
        
        if($formdate->isSubmitted() && $formdate->isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em->persist($date);
            $em->flush();
            
            return $this->redirectToRoute('add_booking');
        }

        $lieu = new Lieu();
        $formlieu = $this->createForm(LieuType::class, $lieu);
        $formlieu->handleRequest($request);

        if($formlieu->isSubmitted() && $formlieu->isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em->persist($lieu);
            $em->flush();

            return $this->redirectToRoute('add_booking');
        }

        $stock = new Marchandise();
        $formstock = $this->createForm(MarchandiseType::class, $stock);
        $formstock->handleRequest($request);

        if($formstock->isSubmitted() && $formstock->isValid())
        {
            $em = $this ->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('add_booking');
        }

       return $this->render('@Commerce/admin/add_booking.html.twig', array(
           'formdate'=>$formdate->createView(),
           'formlieu'=>$formlieu->createView(),
           'formstock'=>$formstock->createView(),
       ));
    }
    
}
