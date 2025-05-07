<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

//Ajouter un commentaire
class CommentAdd extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/article-show.php';
    }

    /** @Override */
    public function do(): void
    {
        //Lit les informations remplit dans le formulaire
        $idArticle = $_POST['idArticle'];
        $content = $_POST['content'];
        LibBlog::createComment($idArticle, $content);

        //Redirige vers la page de détails article
        $this->redirectTo('/ctrl/article-show.php?id=' . $idArticle);
    }
}

// Exécute le Controlleur
$ctrl = new CommentAdd();
$ctrl->execute();
