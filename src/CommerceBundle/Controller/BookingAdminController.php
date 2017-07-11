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
use Symfony\Component\HttpFoundation\Response;


class BookingAdminController extends Controller
{

	public function addLieuAction(Request $request)
	{
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

		return $this->render('@Commerce/admin/add_lieu.html.twig', array(
			'formlieu'=>$formLieu->createView(),
		));
	}

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
			'formMarchandise' => $formMarchandise->createView()
		));
	}

	/**
	 * Ajouter une/des marchandise(s) à un évènement
	 * @param Request $request
	 */
	public function addMarchandiseAction(Request $request)
	{
        $marchandise = new Marchandise();
        $formMarchandise = $this->createForm(MarchandiseType::class, $marchandise);

        $formMarchandise->handleRequest($request);
        if ($request->isXmlHttpRequest())
        {
            
            $a = 1;

            $response = array(
                'msg' => 'ajax'
            );
            return new JsonResponse($response);
		}

		return new Response('ok');
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

}