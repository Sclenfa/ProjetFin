<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdvertController extends Controller {

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