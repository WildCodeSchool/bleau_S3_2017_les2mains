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
     * @param Request $request
     * @return Response
     */
    public function editArticleAction(Request $request)
    {
        if ($request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $idActu = $request->request->get('idElem');
            $article = $em->getRepository(Article::class)->findOneById($idActu);
            $form = $this->generateArticleForm($article);
            $form->handleRequest($request);

            return $this->render('@Blog/editActu.html.twig', array(
                'article_selected' => $article,
                'form' => $form->createView()
            ));
        }
    }

    /**
     * @param Article $article
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function validEditAction(Article $article, Request $request)
    {
        $form = $this->generateArticleForm($article);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return $this->redirectToRoute('blog_actu');
    }

    /**
     * @param $object
     * @return \Symfony\Component\Form\FormInterface
     */
    private function generateArticleForm($object){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $object->getId(), ArticleType::class, $object);
        $formBuilder->setAction($this->generateUrl('blog_actu_editValide', array(
            'id' => $object->getId()
        )));

        $form = $formBuilder->getForm();
        return $form;
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