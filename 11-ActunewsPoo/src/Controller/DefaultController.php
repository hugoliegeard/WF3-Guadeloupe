<?php


class DefaultController
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
        echo '<h1>PAGE ACCUEIL | CONTROLLER</h1>';
    }

    /**
     * Page permettant de lister les
     * articles d'une catégorie.
     */
    public function category()
    {
        echo '<h1>PAGE CATEGORIE | CONTROLLER</h1>';
    }

    /**
     * Page permettant d'afficher
     * un article.
     */
    public function article()
    {
        echo '<h1>PAGE ARTICLE | CONTROLLER</h1>';
    }

}
