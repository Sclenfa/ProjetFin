<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ProjectController extends Controller
{
    /**
     * @Route ("/admin/gestion_projets/{id}", name="gestion_projets", defaults={"id": null})
     */
    public function editAction(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (!empty($id)) {
            $project = $em->getRepository('AppBundle:Project')->find($id);
            $project->setCurrentPhoto($project->getPhoto());
            $project->setPhoto(null);
        } else {
            $project = new Project();
        }

        $form = $this->createForm(ProjectType::class, $project);



        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {

                $photo = $project->getPhoto();

                if ($photo instanceof UploadedFile){
                    $photoName = uniqid() . $photo->getClientOriginalName();
                    $photo->move(
                        $this->getParameter('img_directory'),
                        $photoName
                    );

                    //$project = $form->getData();
                    $project->setPhoto($photoName);
                } else{
                    $project->setPhoto($project->getCurrentPhoto());
                }

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
                'Aucun projet trouvé' . $projectId
            );
        } else {
            return $this->render('fiche_projet.html.twig', ['project' => $project]);
        }
    }

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