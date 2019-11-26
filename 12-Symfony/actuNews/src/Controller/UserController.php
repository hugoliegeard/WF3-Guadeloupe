<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("/connexion.html", name="user_login", methods={"GET|POST"})
     */
    public function login()
    {
        return $this->render('user/login.html.twig');
    }

    /**
     * @Route("/inscription.html", name="user_register", methods={"GET|POST"})
     */
    public function register()
    {
        return $this->render('user/register.html.twig');
    }

}