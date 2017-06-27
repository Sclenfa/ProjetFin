<?php


namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    /**
     * @Route ("/admin", name="administration")
     */
    public function backOffAction(){
        return $this -> render(':Admin:administration.html.twig');
    }


}