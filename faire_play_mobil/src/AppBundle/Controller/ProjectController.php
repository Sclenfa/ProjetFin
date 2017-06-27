<?php

namespace AppBundle\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProjectController extends Controller
{

    /**
     * @param $projectsId
     * @param EntityManagerInterface $em
     * @Route("/nos-projets", name="nos-projets")
     */
    public function allProjectAction(Request $request, EntityManagerInterface $em)
    {
        $categories = $request->query->get('category');

        if (empty($categories)) {
            $categories = [];
        }

        $statuses = $request->query->get('statut');

        if (empty($statuses)) {
            $statuses = [];
        }

        $projectRepository = $this->getDoctrine()->getRepository('AppBundle:Project');

        $projects = $projectRepository->findByCategoriesAndStatuses($categories, $statuses);

        return $this->render('nos_projets.html.twig', ['projects' => $projects]);

    }
}