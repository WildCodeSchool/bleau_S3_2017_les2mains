<?php
namespace CommerceBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller{


    public function ProduitAction()
    {
        return $this->render('@Commerce/produit.html.twig');
    }
}