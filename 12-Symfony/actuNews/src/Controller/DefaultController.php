<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * Page d'accueil
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/category/{alias}", name="default_category", methods={"GET"})
     * @return Response
     */
    public function category($alias)
    {
        return $this->render('default/category.html.twig', [
            'articles' => []
        ]);
    }

    /**
     * @Route("/{categorie}/{alias}_{id}.html",
     *     name="default_article",
     *     methods={"GET"})
     * @return Response
     */
    public function article($alias, $categorie, $id)
    {
        return $this->render('default/article.html.twig');
    }

}