<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

//Ajouter un article
class ArticleHide extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return null;
    }

    /** @Override */
    public function do(): void
    {
        // Vérifier si un admin est connecté
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            $this->redirectTo('/ctrl/public.php');
            exit();
        }
        // Récupérer l'ID de l'article 
        $articleId = $_GET['id'];

        // Publie l'article 
        LibBlog::hideArticle($articleId);

        // Redirige vers la page d'admin
        $this->redirectTo('/ctrl/admin.php');
    }
}

// Exécute le Controlleur
$ctrl = new ArticleHide();
$ctrl->execute();
