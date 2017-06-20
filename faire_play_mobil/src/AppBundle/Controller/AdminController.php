<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{

    /**
     * @Route ("/admin", name="administration")
     */
    public function backOffAction(){
        return $this -> render(':Admin:administration.html.twig');
    }

    /**
     * @Route ("/admin/gestion_membre", name="gestion_membre")
     */
    public function membreAction(){
        return $this -> render(':Admin:gestion_membre.html.twig');
    }

    /**
     * @Route ("/admin/gestion_projets", name="gestion_projets")
     */
    public function projetAction(){
        return $this-> render(':Admin:gestion_projets.html.twig');
    }
}