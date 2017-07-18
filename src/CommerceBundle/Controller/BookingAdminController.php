<?php

namespace CommerceBundle\Controller;

use CommerceBundle\Entity\Evenement;
use CommerceBundle\Entity\Lieu;
use CommerceBundle\Entity\Marchandise;
use CommerceBundle\Entity\User;
use CommerceBundle\Form\EvenementType;
use CommerceBundle\Form\LieuType;
use CommerceBundle\Form\MarchandiseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


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
	 * Créer un évènement
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function editBookingAction(Request $request, Evenement $evenement)
	{
		//Création des formulaires dans la vue Admin add_Booking
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

		return $this->render('@Commerce/admin/edit_booking.html.twig', array(
			'evenement' => $evenement,
			'formEvent'=> $formEvent->createView(),
			'formMarchandise' => $formMarchandise->createView(),
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

	/**
	 * Export on csv format recap commande
	 * @param Evenement $evenement
	 * @return Response
	 */
    public function getCSVAction(Evenement $evenement)
    {
	    $em = $this->getDoctrine()->getManager();
	    $recaps = $em->getRepository(Evenement::class)->getEvenement($evenement->getId());
	    $serializer = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);

	    $i = 0;
	    $datas[$i][] = ' ';

	    foreach ($recaps as $productName => $users)
	    {
			foreach ($users as $name => $qt)
			{
				$datas[$i][] = $name;
			}
			break;
	    }
	    $datas[$i][] = 'Total produit';
	    $datas[$i][] = 'Total prix';

	    $i = 1;
	    foreach ($recaps as $productName => $users)
	    {
		    $datas[$i][] = $productName;
		    foreach ($users as $qt)
		    {
		    	if (isset($qt['quantiteCommande']))
			    {
				    $datas[$i][] = $qt['quantiteCommande'];
			    }
			    else
			    {
				    $datas[$i][] = 0;
			    }
		    }


		    $datas[$i][] = $em->getRepository(User::class)->getTotalByProduct($evenement, $productName)['qt'];
		    $datas[$i][] = $em->getRepository(User::class)->getTotalByProduct($evenement, $productName)['price'];

		    $i++;
	    }

	    $data = $serializer->encode($datas, 'csv');

	    $response = new Response();

	    $response->setStatusCode(200);
	    $response->setContent($data);
	    $response->headers->set('Content-Type', 'text/csv; charset=utf-8');

	    return $response;
    }

}