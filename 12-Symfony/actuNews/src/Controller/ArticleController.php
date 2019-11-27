<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * Démonstration de l'ajout d'un
     * article avec Doctrine.
     * @Route("/demo/article", name="article_demo")
     */
    public function demo()
    {
        # Création d'une catégorie
        $category = new Category();
        $category->setName('Informatique')
            ->setAlias('informatique');

        # Création d'un Utilisateur ( Journaliste )
        $user = new User();
        $user->setFirstname('Hugo')
            ->setLastname('LIEGEARD')
            ->setEmail('hugo@actu.news')
            ->setPassword('test')
            ->setRoles(['ROLE_JOURNALISTE']);

        # Création de l'article
        $article = new Article();
        $article->setTitle('Les données personnelles de 1,2 milliard d’internautes découvertes en libre accès')
            ->setAlias('record-fuite-donnees-personnelles')
            ->setContent('<h3>Deux chercheurs ont trouvé une base de données en ligne contenant des informations sur 4 milliards de comptes sociaux.</h3><p>Les données sont le nerf de la guerre digitale que se livrent les acteurs du web, qu’il s’agisse des GAFAs ou de startups plus modestes. Ciblage publicitaire, meilleure compréhension des usages pour améliorer les produits, personnalisation des expériences ou encore analyse prédictive des comportements à venir, leur utilisation est multiple. Mais la multiplication des données récoltées sur nos actions en ligne offre dans le même temps plus de risques de fuites et d’utilisations à des fins malhonnêtes. La découverte que viennent de faire Bob Diachenko et Vinny Troia en est un symbole important.</p><p>Le 16 octobre dernier, les deux chercheurs ont ainsi découvert un serveur Elasticsearch contenant 4 Tb de données sur 4 milliards de comptes sociaux, concernant 1,2 milliard de personnes, le tout en libre accès. Un record, il s’agit de la plus grosse fuite de données découverte jusqu’à maintenant. Parmi les informations trouvées, citons des noms, des adresses mails, des numéros de téléphone et des informations sur LinkedIn et Facebook. L’ensemble de ces informations étaient publiques, pas de mots de passe ou de numéros de cartes bancaires étaient présents.</p><p>Il s’agirait de données provenant de plusieurs sociétés qui auraient été agrégées. Ces « enrichisseurs de données » (data enrichment) travailleraient en partant d’une simple information (un nom ou une adresse email) pour bâtir un profil le plus complet possible : foyer, revenus, idées politiques, activités favorites… Dans le but de les vendre à d’autres sociétés. Ces « géants de la donnée » seraient donc à l’origine de cette fuite record, ce qui ne présage rien de bon à la fois sur l’utilisation qui est faite de nos données personnelles, mais également sur les brèches de sécurité potentielles et donc des exploitations encore plus malveillantes.</p>')
            ->setImage('donnees-personnelles_opt-1200x799.jpg')
            ->setCategory($category)
            ->setUser($user);

        /*
         * Récupération du Manager de Doctrine
         * -------------------------------------
         * Le EntityManager est une classe qui
         * sait comment persister d'autres
         * classes. (Effectuer des opérations
         * C.R.U.D sur nos Entités).
         * ---
         * Ici, Doctrine va s'aider des
         * annotations pour gérer nos données.
         */
        $em = $this->getDoctrine()->getManager();

        # On précise ce que l'on souhaite sauvegarder
        $em->persist( $category );
        $em->persist( $user );
        $em->persist( $article );

        $em->flush(); // Déclencher l'execution par Doctrine

        # Retourne une réponse
        return new Response('Nouvel article : ' . $article->getTitle());

    }
}
