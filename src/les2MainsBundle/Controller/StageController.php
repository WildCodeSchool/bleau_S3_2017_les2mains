<?php

namespace les2MainsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StageController extends Controller
{
    public function stageAction()
    {
        return $this->render('@les2Mains/User/nos_stages.html.twig');
    }

    public function addAction(Request $request){

        $stage = new Stage();
        $form = $this->CreateForm();

    }
}