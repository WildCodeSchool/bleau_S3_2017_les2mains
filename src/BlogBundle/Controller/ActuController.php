<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Response;

class ActuController extends Controller
{
    /**
     * Show view Actu
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     */
    public function indexAction(Request $request)
    {
        // Init i for paralax in view
        $i = 0;

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('BlogBundle:Article')->findBy(array(), array('id' => 'DESC'));

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_actu');
        }

        return $this->render('@Blog/actualites.html.twig', array(
            'articles' => $articles,
            'i' => $i,
            'form' => $form->createView(),
        ));
    }

    /**
     * Render form for edit article
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function editArticleAction(Article $article, Request $request){

        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $article->getId(), ArticleType::class, $article);
        $formBuilder->setAction($this->generateUrl('blog_actu_editValide', array(
            'id' => $article->getId()
        )));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        return $this->render('@Blog/editActu.html.twig', array(
            'article_selected' => $article,
            'form'  => $form->createView()
        ));
    }

    /**
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function valideEditAction(Article $article, Request $request){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $article->getId(), ArticleType::class, $article);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return $this->redirectToRoute('blog_actu');
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('BlogBundle:Article')->findOneById($id);
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('blog_actu');
    }
}