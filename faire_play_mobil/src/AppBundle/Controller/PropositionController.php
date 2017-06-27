<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\PropositionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

                if($photo instanceof UploadedFile){
                    $photoName = uniqid() . $photo -> getClientOriginalName();
                    $photo->move(
                        $this->getParameter('img_directory'),
                        $photoName
                    );
                    $project->setPhoto($photoName);
                }else{
                    $project->setPhoto($project->getCurrentPhoto());
                }

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

                return $this ->redirectToRoute('nos-projets');

            }
        }

        return $this->render('proposer_un_projet.html.twig', array('form' => $form->createView()));


    }
}