<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Ctrl\Core\Ctrl;
use APP\Model\Lib\blog as LibBlog;

// Montre le formulaire d'ajout d'un nouvel article
class ArticleAddDisplay extends Ctrl
{

    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Ajout d\'un nouvel article';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/article-add.php';
    }
    /** @Override */
    public function do(): void
    {
        //Expose à la vue la liste des catégories
        $listCategory = LibBlog::listCategory();
        $this->addViewArg('listCategory', $listCategory);
    }
}

$ctrl = new ArticleAddDisplay();
$ctrl->execute();
