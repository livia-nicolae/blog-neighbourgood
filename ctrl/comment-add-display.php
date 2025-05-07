<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

//Ajouter un commentaire
class CommentAddDisplay extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null ;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/comment-add.php';

    }

    /** @Override */
    public function do(): void
    {
       //Expose à la vue les détails de l'article d'aprés son ID
       $id = $_GET['article_id'];
       $article = LibBlog::getArticle($id);
       $this->addViewArg('article', $article);
       // ... et ses commentaires
       $listComment = LibBlog::listComment($id);
       $this->addViewArg('listComment', $listComment);

       //Fournit un formulaire d'ajout de commentaire
       
    }
}

// Exécute le Controlleur
$ctrl = new CommentAddDisplay();
$ctrl->execute();
