<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller {

    /**
     * @Route("/index", name="index")
     */
    public function indexAction(){
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/nos-projets", name="nos-projets")
     */
    public function nosProjetsAction(){
        return $this->render('nos_projets.html.twig');
    }

    /**
     * @Route("/proposer", name="proposer-un-projet")
     */
    public function proposerAction(){
        return $this->render('proposer_un_projet.html.twig');
    }

    /**
     * @Route("/soutenir", name="nous-soutenir")
     */
    public function soutenirAction(){
        return $this->render('nous_soutenir.html.twig');
    }

    /**
     * @Route("/contact", name="nous-contacter")
     */
    public function contactAction(){
        return $this->render('nous_contacter.html.twig');
    }

    /**
     * @Route("/projets/{id}", name="fiche-projets")
     */
    public function projetsAction($id){
        return $this->render('fiche_projet.html.twig', array('id' => $id));
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profilAction(){
        return $this->render('profil.html.twig');
    }

    /**
     * @Route ("/administration", name="administration")
     */
    public function backOffAction(){
        return $this -> render(':Admin:administration.html.twig');
    }

    public function membreAction(){
        return $this -> render(':Admin:gestion_membre.html.twig');
    }

    public function projetAction(){
        return $this-> render(':Admin:gestion_projets.html.twig');
    }
}