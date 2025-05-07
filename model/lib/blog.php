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
        $query .= ' FROM article ORDER BY published_at DESC';
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
        $statement->execute();
        $article = $statement->fetch(PDO::FETCH_ASSOC);

        return $article;
    }

    //Liste tous les commentaires d'un article
    public static function listComment($id): array
    {
        $query = 'SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment';
        $query .= ' JOIN article ON comment.article_id = article.id';
        $query .= ' WHERE article.id = :id  ORDER BY created_at DESC;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $listComment = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listComment;
    }
    //Liste les catégories
    public static function listCategory(): array
    {
        $query = 'SELECT category.id, category.name FROM category;';
        $statement = LibDb::connect()->prepare($query);
        $statement->execute();
        $listCategory = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listCategory;
    }

    //Crée un nouvel article
    public static function createArticle($title, $content, $category_id): bool
    {
        $query = 'INSERT INTO article (title, content, account_id, category_id, is_published) VALUES (:title, :content, 210, :category_id, 0);';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':content', $content);
        $statement->bindParam(':category_id', $category_id);
        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }

    //Ajout un commentaire
    public static function createComment($idArticle, $content): bool
    {
        $query = ' INSERT INTO comment(article_id, account_id, content, is_approved) VALUES(:idArticle, 210, :content, 1);';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':idArticle', $idArticle);
        $statement->bindParam(':content', $content);
        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }

    //Liste les articles publiés par un utilisateur d'après son id
    public static function listArticleByAccount($id): array
    {
        $query = 'SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published';
        $query .= ' FROM article JOIN account ON article.account_id = account.id';
        $query .= ' WHERE account_id = :id  ORDER BY created_at DESC;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $listArticleByAccount = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listArticleByAccount;
    }

    //Liste les commentaires publiés par un utilisateur d'après son id
    public static function listCommentByAccount($id): array
    {
        $query = 'SELECT comment.id, comment.article_id, comment.account_id, comment.content, comment.created_at, comment.updated_at, comment.is_approved FROM comment';
        $query .= ' JOIN account ON comment.account_id = account.id';
        $query .= ' WHERE account_id = :id  ORDER BY created_at DESC;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $listCommentByAccount = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listCommentByAccount;
    }
    //Liste les articles d'une catégorie
    public static function listArticleFromCategory($id): array
    {
        $query = 'SELECT article.id, article.title, article.content, article.created_at, article.published_at, article.updated_at, article.account_id, article.category_id, article.is_published';
        $query .= ' FROM article JOIN category ON article.category_id = category.id WHERE category.id = :id ORDER BY published_at DESC;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $listArticleFromCategory = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $listArticleFromCategory;
    }
    //Affiche les détails d'une catégorie
    public static function getCategory($id): ?array
    {
        $query = 'SELECT category.id, category.name FROM category WHERE category.id = :id;';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $category = $statement->fetch(PDO::FETCH_ASSOC);

        return $category;
    }
}
