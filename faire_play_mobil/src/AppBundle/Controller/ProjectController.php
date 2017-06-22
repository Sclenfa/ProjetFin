<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProjectController extends Controller
{
    /**
     * @Route ("/admin/gestion_projets", name="gestion_projets")
     */
    public function newAction(Request $request)
    {
        $project = new Project();

        $form = $this->createForm(ProjectType::class, $project);


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

                $em->persist($project);
                $em->flush();
                return new Response('Le projet est validé !');
            }
        }
        return $this->render(':Admin:gestion_projets.html.twig', array('form' => $form->createView()));
    }


    /**
     * @Route("/fiche/{projectId}", name="fiche")
     */
    public function projectAction($projectId, EntityManagerInterface $em)
    {
        $project = $em->getRepository('AppBundle:Project')
            ->find($projectId);

        if (!$project) {
            throw $this->createNotFoundException(
                'Aucun projet trouver'.$projectId
            );
        }else {
            return $this->render('fiche_projet.html.twig', ['project' => $project]);
        }



    }

    /**
     * @param $projectsId
     * @param EntityManagerInterface $em
     * @Route("/nos-projets", name="nos-projets")
     */
    public function allProjectAction(EntityManagerInterface $em){
        $project = $em->getRepository('AppBundle:Project')
            ->findAll();

        if (!$project) {
            throw $this->createNotFoundException(
                'No product found for id '
            );

        }else{
            return $this->render('nos_projets.html.twig', ['projects' => $project]);
        }


    }

    /**
     *AFFICHE tout les projets
     */

    public function showAllAction(EntityManagerInterface $em)
    {
        $product = $em->getRepository('AppBundle:Project')
            ->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render('.html.twig');
    }

}