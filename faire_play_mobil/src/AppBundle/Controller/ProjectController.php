<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 16/06/2017
 * Time: 16:14
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Project;
use AppBundle\Form\ProjectType;



class ProjectController
{
    public function newAction()
    {
            $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);

        // ...
    }

}