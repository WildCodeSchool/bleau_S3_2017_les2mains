<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:pages:index.html.twig');
    }

    public function contactAction()
    {
        return $this->render('CoreBundle:pages:contact.html.twig');
    }

}
