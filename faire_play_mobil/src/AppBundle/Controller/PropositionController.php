<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\PropositionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class PropositionController extends Controller
{
    /**
     * @Route("/proposer", name="proposer-un-projet")
     */
    public function proposerAction(Request $request){

        $project = new Project();

        $form = $this->createForm(PropositionType::class, $project);


        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            if ($form->isValid()) {

                $photo = $project->getPhoto();
                $photo->move(
                    $this->getParameter('img_directory'),
                    uniqid().$photo->getClientOriginalName()
                );

                //$project = $form->getData();
                $project->setPhoto( $photo->getClientOriginalName());

                /**
                 * envoi en base
                 */
                $em->persist($project);
                $em->flush();

                /**
                 * Envoi du mail
                 */
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


                return new Response('Merci !');




            }
        }

        return $this->render('proposer_un_projet.html.twig', array('form' => $form->createView()));


    }
}