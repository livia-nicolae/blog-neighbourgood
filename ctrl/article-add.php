<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

//Ajouter un article
class ArticleAdd extends Ctrl
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
        // Vérifier si un utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            header("Location: /login-display.php");
            exit();
        }
        // Récupérer l'ID de l'utilisateur depuis la session
        $account_id = $_SESSION['user']['id'];


        // Lis les informations saisies dans le formulaire
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];


        // Ajoute l'article dans la BDD
        LibBlog::createArticle($title, $content, $account_id, $category_id);

        // Redirige vers la page d'accueil
        $this->redirectTo('/ctrl/public.php');
    }
}

// Exécute le Controlleur
$ctrl = new ArticleAdd();
$ctrl->execute();
