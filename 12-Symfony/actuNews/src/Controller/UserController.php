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

        # 1. Création d'un nouvel Utilisateur
        # 2. Création du Formulaire
        # 3. Vérification de la soumission
        # 4. Encodage du MDP ( Ignorer cette étape )
        # 5. Sauvegarde en BDD
        # 6. Notification Flash
        # 7. Redirection sur la page de Connexion

        return $this->render('user/register.html.twig');
    }

}