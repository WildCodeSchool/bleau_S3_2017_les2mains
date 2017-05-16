<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActuController extends Controller
{
    public function indexAction()
    {
        return $this->render('les2MainsBundle:User:actualites.html.twig');
    }
}