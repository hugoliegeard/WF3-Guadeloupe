<?php

namespace App\Controller;

use App\Model\Article;
use App\Model\Category;
use App\Model\User;
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

        # Vérifications
        $article = new Article();
        $category = new Category();
        $user = new User();

        dump( $article->findAll() );
        dump( $category->findAll() );
        dump( $user->findAll() );

        return $this->render('default/home.html.twig');
    }

    /**
     * Page permettant de lister les
     * articles d'une catégorie.
     */
    public function category()
    {
        # echo '<h1>PAGE CATEGORIE | CONTROLLER</h1>';
        # return new Response('<h1>PAGE CATEGORIE | CONTROLLER | RESPONSE</h1>');
        return $this->render('default/category.html.twig');
    }

    /**
     * Page permettant d'afficher
     * un article.
     */
    public function article()
    {
        # echo '<h1>PAGE ARTICLE | CONTROLLER</h1>';
        # return new Response('<h1>PAGE ARTICLE | CONTROLLER | RESPONSE</h1>');
        return $this->render('default/article.html.twig');
    }

}
