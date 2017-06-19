<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Contact;
use CoreBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:pages:index.html.twig');
    }

   /* public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('core_contact');
        }


        return $this->render('@Core/pages/contact.html.twig',array(
            'form'=> $form->createView()
        ));
    }*/

    public function contactAction(Request $request)
    {
        // Create the form according to the FormType created previously.
        // And give the proper parameters

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if($form->isValid()){
                // Send mail
                if($this->sendEmail($form->getData())){
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($contact);
                    $em->flush();
                    // Everything OK, redirect to wherever you want ! :

                    return $this->redirectToRoute('core_contact');
                }else{
                    // An error ocurred, handle
                    var_dump("Errooooor :(");
                }
            }
        }

        return $this->render('@Core/pages/contact.html.twig', array(
            'form' => $form->createView()
        ));
    }

    private function sendEmail($data){
        $myappContactMail = 'phle2022@gmail.com';
        $myappContactPassword = 'HACIENDA';

        // In this case we'll use the ZOHO mail services.
        // If your service is another, then read the following article to know which smpt code to use and which port
        // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
            ->setUsername($myappContactMail)
            ->setPassword($myappContactPassword);

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance()
            ->setSubject('Some Subject')
            ->setFrom('phle2022@gmail.com')
            ->setTo(array('jaymail04@gmail.com','solomon.grundy.51@gmail.com'))
            ->setContentType("text/html")
            ->setBody($this->renderView(':Email:contactMail.html.twig'));

# Send the message
        $this->get('mailer')
            ->send($message);

        return $mailer->send($message);
    }


}



