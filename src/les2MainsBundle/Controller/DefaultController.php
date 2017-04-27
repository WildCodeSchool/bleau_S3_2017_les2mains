<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('les2MainsBundle:Default:index.html.twig');
    }
}
