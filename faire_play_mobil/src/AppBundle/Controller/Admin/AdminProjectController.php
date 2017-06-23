<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 23/06/2017
 * Time: 14:03
 */

namespace AppBundle\Controller\Admin;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AdminProjectController extends Controller
{
    /**
     * @param $projectsId
     * @param EntityManagerInterface $em
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
     *
     * @Route("/admin/suppression/{idProjet}", name="suppression_de_projet")
     *
     */
    public function deleteProjetAction($idProjet, EntityManagerInterface $em)
    {
        $projet = $em->getRepository('AppBundle:Project')->find($idProjet);

        $em->remove($projet);
        $em->flush();

        return $this->redirectToRoute('gestion_projets');

    }
}