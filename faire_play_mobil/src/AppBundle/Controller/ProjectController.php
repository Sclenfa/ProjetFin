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
        $projects = $em->getRepository('AppBundle:Project')
            ->findAll();

        if (!$projects) {
            throw $this->createNotFoundException(
                'Aucun projet trouvé '
            );
        } else {
            return $this->render('nos_projets.html.twig', ['projects' => $projects]);
        }
    }

    }

}