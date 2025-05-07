<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';


use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

// Affiche la page publique 
class Category extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Articles de la catégorie : ' . $this->viewArgs['category']['name'];
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/category.php';
    }
    /** @Override */
    public function do(): void
    {
        // Récupére et expose à la vue la catégorie d'après son id 
        $id = $_GET['id'];
        $category = LibBlog::getCategory($id);
        $this->addViewArg('category', $category);

        //... et liste ses article
        $listArticleFromCategory = LibBlog::listArticleFromCategory($id);
        $this->addViewArg('listArticleFromCategory', $listArticleFromCategory);
    }
}

// Exécute le Controlleur
$ctrl = new Category();
$ctrl->execute();
