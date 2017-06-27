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
use Ivory\GoogleMap\Map;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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

        foreach ($project->getUsers() as $user) {
            if($user->getId()){
                echo 'Bonjour ' . $user  . ', vous participez déjà à ce projet.';
            };
        }

        $map = new Map();
        $map->setAutoZoom(false);


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

        $em->persist($project);
        $em->flush();

        $this->addFlash('greeting','merci pour votre participation !');

        return $this->render('fiche_projet.html.twig', ['project' => $project]);
    }
}