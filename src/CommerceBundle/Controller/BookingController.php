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
        $em = $this ->getDoctrine()->getManager();

        if($formdate->isSubmitted() && $formdate->isValid())
        {
            $em->persist($date);
        }

        $lieu = new Lieu();
        $formlieu = $this->createForm(LieuType::class, $lieu);
        $formlieu->handleRequest($request);

        if($formlieu->isSubmitted() && $formlieu->isValid())
        {
            $em->persist($lieu);
        }

        $stock = new Marchandise();
        $formstock = $this->createForm(MarchandiseType::class, $stock);
        $formstock->handleRequest($request);

        if($formstock->isSubmitted() && $formstock->isValid())
        {
            $em->persist($stock);
        }

        $em->flush();

       return $this->render('@Commerce/admin/add_booking.html.twig', array(
           'formdate'=>$formdate->createView(),
           'formlieu'=>$formlieu->createView(),
           'formstock'=>$formstock->createView(),
       ));
    }
    
}
