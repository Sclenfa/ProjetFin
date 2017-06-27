<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanSiteController extends Controller
{

    /**
     * @Route("/plan_site", name="plan_site")
     */
    public function planSiteAction(){
        return $this->render('plan_site.html.twig');
    }



}