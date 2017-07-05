<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Evenement;
use CommerceBundle\Entity\Lieu;
use CommerceBundle\Entity\Marchandise;
use CommerceBundle\Entity\SelectProduit;
use CommerceBundle\Entity\User;
use CommerceBundle\Form\EvenementType;
use CommerceBundle\Form\LieuType;
use CommerceBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookingController extends Controller
{

    public function listEvenenementAction()
    {
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenement::class)->findAll();

        return $this->render('@Commerce/user/listAllEvenements.html.twig', array(
            'evenements'=> $evenements,
        ));
    }

    public function bookingAction(Request $request, Evenement $evenement)
    {
/*        $em = $this->getDoctrine()->getManager();
        $evenement = $em->getRepository(Evenement::Class)->findOneById($id);*/

        $user = new User();
        foreach ($evenement->getMarchandises() as $marchandise){
            $selectProduit = new SelectProduit();
            $selectProduit->setMarchandise($marchandise);
            $user->addSelectProduit($selectProduit);
        }

        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);


        if ($formUser->isSubmitted() && $formUser->isValid()) {
            $em = $this ->getDoctrine()->getManager();
            $em->persist($user);

            foreach ($user->getSelectProduits() as $selectProduit){
                $selectProduit->setUser($user);
            }
            $em->persist($user);

            $session = $request->getSession();
            $session->set('panier', $user);

            return $this->render('@Commerce/user/recap.html.twig');
        }

        return $this->render('@Commerce/user/booking.html.twig', array(
            'evenement' => $evenement,
            'formUser' => $formUser->createView()
        ));

    }

    public function addBookingAction(Request $request)
    {
        $evenement = new Evenement();

        for ($i = 0; $i < 3; $i++){
            $marchandise = new Marchandise();
            $evenement->addMarchandise($marchandise);
        }

        $formEvent = $this->createForm(EvenementType::class, $evenement);
        $formEvent->handleRequest($request);
        $em = $this ->getDoctrine()->getManager();

        if($formEvent->isSubmitted() && $formEvent->isValid())
        {
            foreach ($evenement->getMarchandises() as $marchandise){
                $marchandise->setEvenement($evenement);
            }
            $em->persist($evenement);
        }

        $lieu = new Lieu();
        $formLieu = $this->createForm(LieuType::class, $lieu);
        $formLieu->handleRequest($request);

        if($formLieu->isSubmitted() && $formLieu->isValid())
        {
            $em->persist($lieu);
        }

        $em->flush();
       return $this->render('@Commerce/admin/add_booking.html.twig', array(
           'formevent'=>$formEvent->createView(),
           'formlieu'=>$formLieu->createView(),
       ));
    }

}

