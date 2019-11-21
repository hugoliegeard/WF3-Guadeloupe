<?php

namespace App\Model;

use App\Model\Db\DbTable;

class Article extends DbTable
{
    protected $table = 'articles_view';

    # Si différent de " id "
    # protected $primary = 'id_article';

    /**
     * Vous avez la possibilité de créer vos
     * propre fonction.
     */

    public function getLastArticles()
    {
        $pdo = $this->getDb();
        $sql = "SELECT * FROM articles_view ORDER BY id DESC";
        $query = $pdo->prepare( $sql );
        $query->execute();
        return $query->fetchAll();
    }

}