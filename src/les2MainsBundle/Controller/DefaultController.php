<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@les2Mains/User/index.html.twig');
    }

    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /*public function nousAction()
    {
        return $this->render('@les2Mains/User/nous.html.twig');
    }*/
}
