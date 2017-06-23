<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/06/2017
 * Time: 10:44
 */

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{

    /**
     * @Route("/users", name="users")
     */
    public function showUserAction(EntityManagerInterface $em)
    {
        $users = $em->getRepository('AppBundle:User')
            ->findAll();

            return $this->render('users.html.twig', ['users' => $users]);

    }

    /**
     * @Route("/profil", name="profil")
     */
    public function showUserByIdAction(EntityManagerInterface $em)
    {
        //$idUser = $em->getRepository('AppBundle:User')->find($id);

        $user = $this->getUser();

        return $this->render('profil.html.twig', ['user' => $user]);

    }

}
