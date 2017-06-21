<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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