<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function exempleProjetAction(EntityManagerInterface $em)
    {

        $query = $em->createQuery(
                "SELECT p
                FROM AppBundle:Project p
                WHERE p.statut <> :statut
                ORDER BY p.dateBegin ASC"
        )->setParameter('statut', 'en_attente');



        $projects =  $query
            ->setMaxResults(3)
            ->getResult();

        return $this->render('index.html.twig', [ 'projects'=>$projects ] );

    }
}