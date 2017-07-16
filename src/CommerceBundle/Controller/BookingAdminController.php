<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Evenement;
use CommerceBundle\Entity\Lieu;
use CommerceBundle\Entity\Marchandise;
use CommerceBundle\Form\EvenementType;
use CommerceBundle\Form\LieuType;
use CommerceBundle\Form\MarchandiseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class BookingAdminController extends Controller
{

	/**
	 * Créer un évènement
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function addBookingAction(Request $request)
	{
		//Création des formulaires dans la vue Admin add_Booking
		$evenement = new Evenement();
		$marchandise = new Marchandise();
		$formEvent = $this->createForm(EvenementType::class, $evenement);
		$formMarchandise = $this->createForm(MarchandiseType::class, $marchandise);


		$lieu = new Lieu();
		$formLieu = $this->createForm(LieuType::class, $lieu);
		$formLieu->handleRequest($request);

		if($formLieu->isSubmitted() && $formLieu->isValid())
		{
			$em = $this ->getDoctrine()->getManager();
			$em->persist($lieu);
			$em->flush();

			return $this->redirectToRoute('add_booking');
		}

		$formEvent->handleRequest($request);
		if ($request->isXmlHttpRequest())
		{
			$em = $this ->getDoctrine()->getManager();
			$em->persist($evenement);
			$em->flush();

			$response = array(
				'msg' => 'ok',
				'idEvenement' => $evenement->getId()
			);
			return new JsonResponse($response);
		}

		return $this->render('@Commerce/admin/add_booking.html.twig', array(
			'formEvent'=> $formEvent->createView(),
			'formMarchandise' => $formMarchandise->createView(),
			'formLieu' => $formLieu->createView()
		));
	}

	/**
	 * Ajouter une/des marchandise(s) à un évènement
	 * @param Request $request
	 * @return mixed
	 */
	public function addMarchandiseAction(Request $request)
	{
        $marchandise = new Marchandise();
        $formMarchandise = $this->createForm(MarchandiseType::class, $marchandise);
        $formMarchandise->handleRequest($request);

        if ($request->isXmlHttpRequest())
        {
			$em = $this->getDoctrine()->getManager();
        	$idEvenement = $request->request->get('idEvenement');
        	$evenement = $em->getRepository(Evenement::class)->findOneById($idEvenement);
        	$existingMarchandise = $em->getRepository(Marchandise::class)->getCheckMarchandiseById($idEvenement, $marchandise->getProduct()->getId());

        	if ($existingMarchandise == null)
            {

                $evenement->addMarchandise($marchandise);
                $marchandise->setEvenement($evenement);

                $em->flush();

                $response = array(
                    'marchandise' => array(
                        'nom' => $marchandise->getProduct()->getName(),
                        'prix' => $marchandise->getPrix(),
                        'quantite' => $marchandise->getQuantite(),
                        'unite' => $marchandise->getUnite(),
                        'id' => $marchandise->getId()
                    ),
                    'evenement' => array(
                        'id' => $evenement->getId()
                    ),
                    'msg' => 'ok'
                );

            }
            else
            {
        	    $response = array(
        	        'msg'=> 'error'
                );
            }
        }

        return new JsonResponse($response);
	}

	/**
	 * Delete one evenement and all marchandises
	 * @param $id
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function deleteEvenementAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$evenement = $em->getRepository('CommerceBundle:Evenement')->findOneById($id);
		$em->remove($evenement);
		$em->flush();

		return $this->redirectToRoute('list_evenementAction');
	}

    /**
     * @param Request $request
     * @return JsonResponse
     */
	public function deleteMarchandiseAction(Request $request){

	    if($request->isXmlHttpRequest())
	    {
	        $em = $this->getDoctrine()->getManager();
	        $id = $request->request->get('id');

	        $marchandise = $em->getRepository(Marchandise::class)->findOneById($id);

            $em->remove($marchandise);
            $em->flush();

            $response = new JsonResponse("Le produit a bien été supprimé");

	        return $response;

        }

    }

}