<?php


class Classe
{
    private $nom,
            $professeur,
            $effectif,
            $eleves;

    /**
     * Classe constructor.
     * @param $nom
     * @param $professeur
     * @param $effectif
     * @param $eleves
     */
    public function __construct($nom, $professeur, $effectif)
    {
        $this->nom = $nom;
        $this->professeur = $professeur;
        $this->effectif = $effectif;
        $this->eleves = [];
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }

    /**
     * @param mixed $professeur
     */
    public function setProfesseur($professeur)
    {
        $this->professeur = $professeur;
    }

    /**
     * @return mixed
     */
    public function getEffectif()
    {
        return $this->effectif;
    }

    /**
     * @param mixed $effectif
     */
    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;
    }

    /**
     * @return mixed
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * Permet d'ajouter un élève
     * à la classe.
     * TODO : Vérifier que l'élève n'existe pas déjà...
     * @param Eleve $eleve
     */
    public function ajouterUnEleve(Eleve $eleve)
    {
        $this->eleves[] = $eleve;
    }

}