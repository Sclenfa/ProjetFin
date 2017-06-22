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
}