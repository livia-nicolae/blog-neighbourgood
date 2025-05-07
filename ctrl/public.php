<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';


use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

// Affiche la page publique 
class Main extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Page d\'accueil';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/public.php';
    }
    /** @Override */
    public function do(): void
    {
        // Liste les articles
        $listArticle = LibBlog::listArticle();
        $this->addViewArg('listArticle', $listArticle);
        //Liste les catégories
        $listCategory = LibBlog::listCategory();
        $this->addViewArg('listCategory', $listCategory);
    }
}

// Exécute le Controlleur
$ctrl = new Main();
$ctrl->execute();
