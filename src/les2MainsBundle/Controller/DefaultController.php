<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@les2Mains/User/index.html.twig');
    }

    public function nousAction()
    {
        return $this->render('@les2Mains/User/nous.html.twig');
    }
}
