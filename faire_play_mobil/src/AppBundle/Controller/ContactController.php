<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 14:28
 */

namespace AppBundle\Controller;

use AppBundle\Form\PropositionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="nous-contacter")
     */
    public function sendMail(){
        $mailer = $this->get('mailer');
        $message = new Swift_Message('Hello Email');
        $message
            ->setFrom('faireplaymobil@gmail.com')
            ->setTo('faireplaymobil@gmail.com')
            ->attach(\Swift_Attachment::fromPath('img_directory')->setFilename($photo->getClientOriginalName()))
            ->setBody('<h1>test</h1>'
                /*$this->renderView(
                    'proposer_un_projet.html.twig',
                )*/,
                'text/html'
            );

        $mailer->send($message);

        return $this ->redirectToRoute('nos-projets');
        return $this->render('nous_contacter.html.twig');
    }

}