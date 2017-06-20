<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PropositionController extends Controller
{
    /**
     * @Route("/proposer", name="proposer-un-projet")
     */
    public function proposerAction(){
        //
        $mailer = $this->get('mailer');
        $message = new Swift_Message('Hello Email');
        $message
            ->setFrom('faireplaymobil àgmail.com')
            ->setTo('faireplaymobil@gmail.com')
            ->setBody('<h1>test</h1>'
                /*$this->renderView(
                    'proposer_un_projet.html.twig',
                    array('name' => $name)
                )*/,
                'text/html'
            );

        $mailer->send($message);
        return $this->render('proposer_un_projet.html.twig');
    }
}