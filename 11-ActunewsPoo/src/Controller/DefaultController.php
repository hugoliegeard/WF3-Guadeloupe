<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{

    /**
     * La fonction "home" est ce qu'on
     * appelle une "action". Une action
     * est une page.
     * ------------------------
     * Page d'accueil du site
     */
    public function home()
    {
        return $this->render('default/home.html.twig');
    }

    /**
     * Page permettant de lister les
     * articles d'une catégorie.
     */
    public function category()
    {
        # echo '<h1>PAGE CATEGORIE | CONTROLLER</h1>';
        return new Response('<h1>PAGE CATEGORIE | CONTROLLER | RESPONSE</h1>');
    }

    /**
     * Page permettant d'afficher
     * un article.
     */
    public function article()
    {
        # echo '<h1>PAGE ARTICLE | CONTROLLER</h1>';
        return new Response('<h1>PAGE ARTICLE | CONTROLLER | RESPONSE</h1>');
    }

}
