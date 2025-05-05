<?php

namespace App\Model\Lib;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';

use PDO;

use App\Model\Lib\Db\Lib as LibDb;

class blog
{
    //Liste tous les articles de blog
    public static function listArticle(): array
    {
        $query = 'SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published';
        $query .= ' FROM article;';
        $statement = LibDb::connect()->prepare($query);
        $statement->execute();
        $listArticle = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listArticle;
    }
}
