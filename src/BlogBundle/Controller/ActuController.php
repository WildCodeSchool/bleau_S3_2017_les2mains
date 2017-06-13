<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Form\ArticleType;

class ActuController extends Controller
{
    public function indexAction(Request $request)
    {
        $i = 0;

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('BlogBundle:Article')->findBy(array(), array('id' => 'DESC'));


        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_actu');
        }

        return $this->render('@Blog/actualites.html.twig', array(
            'articles' => $articles,
            'i'=> $i,
            'form' => $form->createView(),
            'article' => $article
        ));
    }


}