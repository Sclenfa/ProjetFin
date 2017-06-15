<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 15/06/2017
 * Time: 14:01
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Response;

class AdvertController{

    public function homeAction(){
        return new Response("test");
    }

    public function nosProjetsAction(){
        return new Response("test n°2");
    }
}