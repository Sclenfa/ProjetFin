<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 14:28
 */

namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="nous-contacter")
     */
    public function sendMail(){

        $form = $this->createForm(ContactType::class);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $mailer = $this->get('mailer');
                $message = new Swift_Message('Hello Email');
                $message
                    ->setFrom('faireplaymobil@gmail.com')
                    ->setTo('faireplaymobil@gmail.com')
                    ->setBody('<h1>test</h1>'
                        /*$this->renderView(
                            'proposer_un_projet.html.twig',
                        )*/,
                        'text/html'
                    );

                $mailer->send($message);

                $this->addFlash('greeting','Votre message a bien été transmis!');


                return $this ->redirectToRoute('homepage');
            }
        }
        return $this->render('nous_contacter.html.twig', array('form' => $form->createView()));
    }

}