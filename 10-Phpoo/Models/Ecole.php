<?php

/**
 * Une classe PHP est une entitée regroupant par thème
 * des variables appelée "propriétés"
 * et des fonctions appelée "méthodes".
 */
class Ecole
{
    /* --
        Déclaration des propriétés de notre classe Ecole.
        "private" nous permet d'interdire l'accès direct
        aux propriétés par les objets. En "private" les
        propriétés sont accessibles UNIQUEMENT depuis
        l'intérieur de la classe.
    -- */
    private $nom;
    private $adresse;
    private $effectif;
    private $directeur;
    private $classes = [];

    /**
     * Alors, pour permettre l'attribution
     * de valeurs à mes propriétés, je vais
     * mettre en place un CONSTRUCTEUR.
     * ---------------------------------
     * L'objectif du constructeur c'est
     * de remplir / d'initialiser / hydrater
     * les propriétés de la classe avec des valeurs.
     * IL DOIT ETRE ACCESSIBLE PUBLIQUEMENT !!!
     * ---------------------------------
     * Cette fonction est executée AUTOMATIQUEMENT
     * par PHP au moment de l'instanciation de la classe.
     */
    public function __construct($nom, $adresse, $directeur, $effectif)
    {
        /*
         * La propriété "nom" de classe ( $this->nom )
         * prend comme valeur, la valeur de la variable ( $nom )
         * passé en paramètre au moment de l'instanciation.
         * ------------------------------------------------
         * $this se réfère à votre objet
         */
        $this->nom          = $nom;
        $this->effectif     = $effectif;
        $this->directeur    = $directeur;
        $this->adresse      = $adresse;
        // -- Fin du constructeur
    }

    /*  -- ~ ° ~ --| Getters |-- ~ ° ~ -- */

    public function getNom()
    {
        return $this->nom;
    }

    public function getEffectif()
    {
        return $this->effectif;
    }

    public function getDirecteur()
    {
        return $this->directeur;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    /*  -- ~ ° ~ --| Setters |-- ~ ° ~ -- */

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;
    }

    public function setDirecteur($directeur)
    {
        $this->directeur = $directeur;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Permet d'affecter une classe a une ecole
     * @param Classe $classe
     */
    public function ajouterUneClasse(Classe $classe)
    {
        $this->classes[] = $classe;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

}
