<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';


use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

// Affiche la page de profil utilisateur 
class Profile extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Profil';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/profile.php';
    }

    /** @Override */
    public function do(): void
    {
        // Charge les information du compte à partir de son email
        $username = $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $role = $_SESSION['user']['role'];
        $creationDate = $_SESSION['user']['created_at'];
        $is_banned = $_SESSION['user']['is_banned'];

        // Les expose à la vue
        $this->addViewArg('username', $username);
        $this->addViewArg('email', $email);
        $this->addViewArg('role', $role);
        $this->addViewArg('created_at', $creationDate);
        $this->addViewArg('is_banned', $is_banned);

        //Charge les articles publiés par l'utilisateur
        $id = $_SESSION['user']['id'];
        $articlesByAccount = LibBlog::listArticleByAccount($id);
        //Les expose à la vue
        $this->addViewArg('articlesByAccount', $articlesByAccount);

        //Charge les commentaires publiés par l'utilisateur
        $commentsByAccount = LibBlog::listCommentByAccount($id);
        //Les expose à la vue
        $this->addViewArg('commentsByAccount', $commentsByAccount);
    }
}

// Exécute le Controlleur
$ctrl = new Profile();
$ctrl->execute();
