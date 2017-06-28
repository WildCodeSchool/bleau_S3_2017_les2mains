<?php
namespace CommerceBundle\Controller;


use CommerceBundle\Entity\Category;
use CommerceBundle\Entity\Product;
use CommerceBundle\Form\CategoryType;
use CommerceBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{

    public function addProductAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Product::class)->findAll();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Category::class)->getCategory();

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product');
        }

        $category = new Category();
        $forms = $this->createForm(CategoryType::class, $category);
        $forms->handleRequest($request);

        if ($forms->isSubmitted() && $forms->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('product');
        }

        return $this->render('@Commerce/product.html.twig', array(
            'products' => $products,
            'categories' => $categories,
            'form' => $form->createView(),
//            'forms' => $forms->createView(),
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('CommerceBundle:Product')->findOneById($id);
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('product');
    }

    public function editProductAction(Product $products, Request $request){

        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $products->getId(), ProductType::class, $products);
        $formBuilder->setAction($this->generateUrl('product_edit_valid', array(
            'id' => $products->getId()
        )));

        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        return $this->render('@Commerce/product.html.twig', array(
            'products' => $products,
            'form'  => $form->createView()
        ));
    }

    /**
     * @param Product $products
     * @param Request $request
     * @return Response
     */
    public function validEditAction(Product $products, Request $request){
        $formBuilder = $this->get('form.factory')->createNamedBuilder('form_' . $products->getId(), ProductType::class, $products);
        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($products);
        $em->flush();

        return $this->redirectToRoute('product');
    }


}