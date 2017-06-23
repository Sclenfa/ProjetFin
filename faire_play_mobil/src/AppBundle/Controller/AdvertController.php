<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller {



    /**
     * @Route("/nos-projets", name="nos-projets")
     */
    public function nosProjetsAction(){
        return $this->render('nos_projets.html.twig');
    }

    /**
     * @Route("/proposer", name="proposer")
     *
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
     * @Route("/profil", name="profil")
     */
    public function profilAction(){
        return $this->render('profil.html.twig');
    }



}