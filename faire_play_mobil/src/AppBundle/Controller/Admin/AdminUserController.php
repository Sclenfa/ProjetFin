<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 23/06/2017
 * Time: 12:37
 */

namespace AppBundle\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminUserController extends Controller
{
    /**
     * @Route ("/admin/gestion_membre", name="gestion_membre")
     */

    public function membreAction(EntityManagerInterface $em)
    {
        $users = $em->getRepository('AppBundle:User')
            ->findAll();

        return $this -> render(':Admin:gestion_membre.html.twig', ['users' => $users]);
    }

    /**
     *
     * @Route("/admin/suppression/{idMembre}", name="suppression_de_membre")
     *
     */
    public function deleteMembreAction($idMembre, EntityManagerInterface $em)
    {
        $membre = $em->getRepository('AppBundle:User')->find($idMembre);

        $em->remove($membre);
        $em->flush();

        return $this->redirectToRoute('gestion_membre');

    }

}