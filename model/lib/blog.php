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

    //Affiche les détails d'un article
    public static function getArticle($id): ?array
    {
        $query = 'SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published';
        $query .= ' FROM article WHERE article.id=:id;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $successOrFailure = $statement->execute();
        $article = $statement->fetch(PDO::FETCH_ASSOC);
   
        return $article;
    }

    //Affiche tous les commentaires d'un article
    public static function listComment($id): array
    {
        $query = 'SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment';
        $query .= ' JOIN article ON comment.article_id = article.id';
        $query .= ' WHERE article.id = :id;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $successOrFailure = $statement->execute();
        $listComment = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listComment;
    }
}