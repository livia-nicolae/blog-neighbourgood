<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;


// Affiche les Détails d'un article et ses commentaires.

class ArticleShow extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return $this->viewArgs['article']['title'];
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/article-show.php';
    }
    /** @Override */
    public function do(): void
    {
        //Expose à la vue les détails de l'article d'aprés son ID
        $id = $_GET['id'];
        $article = LibBlog::getArticle($id);
        $this->addViewArg('article', $article);
        
        // ... ses commentaires
        $listComment = LibBlog::listComment($id);
        $listCommentAug = [];
        // Récupérer les noms d'utilisateur pour chaque commentaire
        foreach ($listComment as $comment)
        {
            $author = LibBlog::getAccount($comment['account_id']);
            $comment['username'] = $author['username']; 

            $listCommentAug[] = $comment; 
        }
        //... et les expose à la vue
        $this->addViewArg('listComment', $listCommentAug);
    }
}
// Exécute le Controlleur
$ctrl = new ArticleShow();
$ctrl->execute();
