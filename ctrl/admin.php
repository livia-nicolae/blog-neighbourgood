<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;
use App\Model\Lib\user as LibUser;

// Affiche la page de profil utilisateur 
class Admin extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Profil administrateur';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/admin.php';
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

        //Liste les articles et les expose à la vue
        $listArticle = LibBlog::listArticle();
        $this->addViewArg('listArticle', $listArticle);

        //Liste les comptes
        $listAccount = LibUser::listAccount();
        $this->addViewArg('listAccount', $listAccount);

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
$ctrl = new Admin();
$ctrl->execute();
