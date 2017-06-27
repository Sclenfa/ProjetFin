<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class AdminProjectController extends Controller
{

    /**
     * @Route("/gestion_projets", name="gestion_projets")
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
            return $this->render(':Admin:gestion_projets.html.twig', ['projects' => $projects]);
        }
    }

    /**
     * @Route ("/admin/modification/{id}", name="modification_projets")
     */
    public function editAction(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (!is_null($id)) {
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

                    $project->setPhoto($photoName);
                } else{
                    $project->setPhoto($project->getCurrentPhoto());
                }

                $em->persist($project);
                $em->flush();

                return $this->redirectToRoute('gestion_projets');
            }
        }
        return $this->render(':Admin:modif_projet.html.twig', array('form' => $form->createView()));
    }



    /**
     * @Route("/admin/suppression/{idProjet}", name="suppression_de_projet")
     */
    public function deleteProjetAction($idProjet, EntityManagerInterface $em)
    {
        $projet = $em->getRepository('AppBundle:Project')->find($idProjet);

        $em->remove($projet);
        $em->flush();

        return $this->redirectToRoute('gestion_projets');

    }
}