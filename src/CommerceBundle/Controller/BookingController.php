<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Evenement;
use CommerceBundle\Entity\Lieu;
use CommerceBundle\Entity\Marchandise;
use CommerceBundle\Entity\Product;
use CommerceBundle\Entity\SelectProduit;
use CommerceBundle\Entity\User;
use CommerceBundle\Form\EvenementType;
use CommerceBundle\Form\LieuType;
use CommerceBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * Create basket
     * @param Request $request
     * @param Evenement $evenement
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function bookingAction(Request $request, Evenement $evenement)
    {
        //************************************************************//

            // Méthode qui remplace le typage strict Evenement,$evenement
            /*$em = $this->getDoctrine()->getManager();
              $evenement = $em->getRepository(Evenement::Class)->findOneById($id);*/


        //************************************************************//

        // TODO: Request by event for order by
        $em = $this->getDoctrine()->getManager();

        $user = new User();

        // On récupère toutes les marchandises misent à disposition par l'évènement et on les stock dans une variable $marchandises
        $marchandises = $em->getRepository(Marchandise::class)->getMarchandiseById($evenement->getId());

        // Pour chaque marchandie à l'intérieur du tableau de marchandise (le tableau de marchandise correspond à toutes les marchandises disponible dans l'evenement)
        // La boucle permet de générer autant de formulaire qu'il y a de produit disponible lors de l'évènement afin de pouvoir les reserver (collectionType)
        foreach ($marchandises as $marchandise){

            // Création d'un new objet de la table SelectProduit
            $selectProduit = new SelectProduit();
            // Associer un produit à un produit selectionné
            $selectProduit->setProduct($marchandise->getProduct());
            // ajout de ts les produits crées dans la Var User
            $user->addSelectProduit($selectProduit);
        }

        // Création d'un formulaire User(Panier)
        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);

        if ($formUser->isSubmitted() && $formUser->isValid())
        {
            // Création d'un tableau qui correspondant à notre panier, les champs déclarer dans le tableau correspondent aux attributs de la class User et SelectProduit
            $panier = array(
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'selectProduit' => array()
            );

            // Pour chaque produit selectionner par le user, je récupère les informations (prix, quantités, idProduit) et les stock dans mon panier
            foreach ($user->getSelectProduits() as $key => $selectProduit)
            {
                // Je récupère la quantité de produit selectionné
                $quantity = $selectProduit->getQuantiteCommande();

                // Si le produit à été selectionné (la quantitée est supérieur à 0), je calcul le prix total lié au produit
                if ($quantity > 0){
                    // Prix unitaire du produit selectionné
                    $prixUnitaire = $marchandises[$key]->getPrix();

                    $prixTotal = $quantity * $prixUnitaire;

                    $panier['selectProduit'][$key] = array(
                        'prixTotal' => $prixTotal,
                        'quantiteCommande' => $quantity,
                        'idProduit' => $selectProduit->getProduct()->getId()
                    );
                }
            }

            // Je récupère la session utilisateur
            $session = $request->getSession();

            // Ma session se comporte comme un tableau associatif, donc à l'index panier, je stock ma variable $panier qui représente le contenu de mon panier (produits selectionnés par l'utilisateur)
            $session->set('panier', $panier);

            // Je retourne à la vue 'Recap' mon panier ($user) afin que le user puisse valider son panier
            return $this->render('@Commerce/user/recap.html.twig', array(
                'panier' => $session->get('panier'),
                'evenement' => $evenement,
            ));
        }
        // Sinon retour à la vue de notre formulaire
        return $this->render('@Commerce/user/booking.html.twig', array(
            'evenement' => $evenement,
            'formUser' => $formUser->createView()
        ));

    }
    public function validBookingAction(Request $request, Evenement $evenement)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $panier = $session->get('panier');

        $user = new User();

        $user->setNom($panier['nom']);
        $user->setPrenom($panier['prenom']);
        $user->setEvenement($evenement);

        foreach ($panier['selectProduit'] as $value)
        {
            $produit = $em->getRepository(Product::class)->findOneById($value['idProduit']);
            $selectProduit = new SelectProduit();
            $selectProduit->setPrixTotal($value['prixTotal']);
            $selectProduit->setQuantiteCommande($value['quantiteCommande']);
            $selectProduit->setProduct($produit);
            $selectProduit->setUser($user);
            $user->addSelectProduit($selectProduit);
        }


        $em = $this ->getDoctrine()->getManager();
        $em->persist($user);
        $session->remove('panier');

        $em->flush();

        return new Response('ok');
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

