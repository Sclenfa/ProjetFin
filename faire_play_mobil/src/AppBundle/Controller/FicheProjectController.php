<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 10:05
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FicheProjectController extends Controller
{
    /**
     * @Route("/fiche/{projectId}", name="fiche")
     */
    public function projectAction($projectId, EntityManagerInterface $em)
    {
        $project = $em->getRepository('AppBundle:Project')
            ->find($projectId);

        if (!$project) {
            throw $this->createNotFoundException(
                'Aucun projet trouvé' . $projectId
            );
        }

        return $this->render('fiche_projet.html.twig', ['project' => $project]);
    }

    /**
     *
     * @Route("/fiche/participant/{projectId}", name="participer")
     *
     */
    public function participerAction($projectId, EntityManagerInterface $em)
    {

        /** @var Project */
        $project = $em->getRepository('AppBundle:Project')->find($projectId);

        $participant = $project->getParticipant();
        $project->setParticipant($participant + 1);

            $project->addUser($this->getUser());

        $mailer = $this->get('mailer');
        $message = new Swift_Message('Participation au projet '. $project->getName());

        $messageBody = <<<EOS
        <h1>Bonjoir, </h1>
        <p> Félicitations ! Vous avez un participant de plus à votre projet.
         Vous pouvez désormais prendre contact en lui envoyant directement un mail : {$user->getEmail()}</p>
EOS;


        $message
            ->setFrom('toto.lopez.45@gmail.com')
            ->setTo('emma.carre@gmail.com')
            ->setBody($messageBody,
                'text/html'
            );

        $mailer->send($message);

        $em->persist($project);
        $em->flush();

        $this->addFlash('greeting','merci pour votre participation !');

        return $this->render('fiche_projet.html.twig', ['project' => $project]);
    }
}