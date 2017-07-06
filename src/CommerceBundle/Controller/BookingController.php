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
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listEvenenementAction()
    {
        // La liste des Evenements Crées en BDD
        $em = $this->getDoctrine()->getManager();
        $evenements = $em->getRepository(Evenement::class)->findAll();

        // On retourne à la vue tous les évenements
        return $this->render('@Commerce/user/listAllEvenements.html.twig', array(
            'evenements'=> $evenements,
        ));
    }

    /**
     * @param Request $request
     * @param Evenement $evenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function bookingAction(Request $request, Evenement $evenement)
    {
        // Méthode qui permet de définir(remplir) un panier.

                //************************************************************//

                    // Méthode qui remplace le typage strict Evenement,$evenement
                    /*$em = $this->getDoctrine()->getManager();
                      $evenement = $em->getRepository(Evenement::Class)->findOneById($id);*/


                //************************************************************//

        $user = new User();
        // Recupération des marchandises dans les évenements
        foreach ($evenement->getMarchandises() as $marchandise){
            // Création d'un new objet de la table SelectProduit
            $selectProduit = new SelectProduit();
            //Joindre des marchandises à $selectProduit
            $selectProduit->setMarchandise($marchandise);
            // ajout de ts les produits crées dans la Var User
            $user->addSelectProduit($selectProduit);
        }
            // Création d'un formulaire User(Panier)
        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);


        if ($formUser->isSubmitted() && $formUser->isValid())
        {
            // Connexion à la BDD
            $em = $this ->getDoctrine()->getManager();
            // Stockage des informations dans la Var $user
            $em->persist($user);

        //  SelectProduit Attribué à User à chaque tour de boucle
            foreach ($user->getSelectProduits() as $selectProduit)
            {
                $selectProduit->setUser($user);
            }
            $em->persist($user);
        // Conservation en Mémoire Temp des infos de $user
            $session = $request->getSession();
            $session->set('panier', $user);
        // Je retourne à la vue 'Recap' mon panier ($user) si ce dernier est valide
            return $this->render('@Commerce/user/recap.html.twig');
        }
        // Sinon retour à la vue de notre formulaire
        return $this->render('@Commerce/user/booking.html.twig', array(
            'evenement' => $evenement,
            'formUser' => $formUser->createView()
        ));

    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addBookingAction(Request $request)
    {
        //Création des formulaires dans la vue Admin add_Booking
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

