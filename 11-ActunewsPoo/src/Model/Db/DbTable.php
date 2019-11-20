<?php


namespace App\Model\Db;

use App\Model\Container\Container;

/**
 * Class DbTable
 * @package App\Model\Db
 * Permettra de faire des requètes CRUD
 * sur les tables d'une BDD.
 */
abstract class DbTable
{
    # Nom de la table
    protected $table;

    # Clé primaire
    protected $primary = 'id';

    # Instance de PDO
    /** @var \PDO $db */
    private $db;

    public function __construct()
    {
        # Récupération du Container
        $container = Container::getInstance();

        # Récupération de PDO
        $this->db = $container->get('pdo');
    }

    /**
     * @return \PDO
     */
    public function getDb(): \PDO
    {
        return $this->db;
    }

    /**
     * Récupérer toutes les informations
     * d'une table dans la BDD.
     * @param string $where
     * @param string $orderBy
     * @param string $limit
     * @param string $offset
     * @return array
     */
    public function findAll(
        string $where = '',
        string $orderBy = '',
        string $limit = '',
        string $offset = ''
    ): array
    {
        # Requète SELECT
        $sql = "SELECT * FROM " . $this->table;

        # Si $where n'est pas vide
        if ( !empty( $where ) ) {
            $sql .= ' WHERE ' . $where;
        }

        # Si $orderBy n'est pas vide
        if ( !empty( $orderBy ) ) {
            $sql .= ' ORDER BY ' . $orderBy;
        }

        # Si $limit n'est pas vide
        if ( !empty( $limit ) ) {
            $sql .= ' LIMIT ' . $limit;
        }

        # Si $offset n'est pas vide
        if ( !empty( $offset ) ) {
            $sql .= ' OFFSET ' . $offset;
        }

        # Préparation et Execution de la requète
        $query = $this->db->prepare( $sql );
        $query->execute();

        # Retour du résultat
        return $query->fetchAll();
    }

}