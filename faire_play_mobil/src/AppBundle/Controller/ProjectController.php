<?php

namespace AppBundle\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProjectController extends Controller
{

    /**
     * @param $projectsId
     * @param EntityManagerInterface $em
     * @Route("/nos-projets", name="nos-projets")
     */
    public function allProjectAction(EntityManagerInterface $em)
    {
        $query = $em->createQuery(
            "SELECT p
                FROM AppBundle:Project p
                WHERE p.statut <> :statut"
        )->setParameter('statut', 'en_attente');

        $projects = $query->getResult();


                    return $this->render('nos_projets.html.twig', ['projects' => $projects]);

    }
}