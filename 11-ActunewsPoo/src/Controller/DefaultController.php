<?php

namespace App\Controller;

use App\Model\Article;

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
        # 1. Récupération des Articles de la BDD
        $articles = (new Article())->getLastArticles();

        # 2. Transmission des données à la vue
        return $this->render('default/home.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * Page permettant de lister les
     * articles d'une catégorie.
     */
    public function category()
    {

        # Récupération de l'instance de Request dans le container
        $request = $this->getParameter('request');
        # dump($request);

        # Récupération dans la Request du paramètre $_GET['id']
        $idCategorie = $request->get('id') ?? 1;

        # Récupération des articles de la catégorie
        $article = new Article();

        $where = 'idCategorie = ' . $idCategorie;
        $articles = $article->findAll($where);
        # dump( $articles );

        return $this->render('default/category.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * Page permettant d'afficher
     * un article.
     */
    public function article()
    {
        # Récupération de l'instance de Request dans le container
        $request = $this->getParameter('request');

        # Récupération dans la Request du paramètre $_GET['id']
        $idArticle = $request->get('id') ?? 0; // $_GET['id']

        # Récupération de l'article dans la BDD
        $article = (new Article())->findOne($idArticle);

        # Transmission de l'article a la vue
        return $this->render('default/article.html.twig', [
            'article' => $article
        ]);
    }

}
