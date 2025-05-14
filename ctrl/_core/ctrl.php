<?php

namespace App\Ctrl\Core;

// Affiche toutes les erreurs
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrlI.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/blog.php';

use App\Model\Lib\blog as LibBlog;

abstract class Ctrl implements CtrlI
{
    /** Arguments mis à disposition de la vue (tableau de clé/valeur). */
    protected array $viewArgs = [];

    /** Méthode principale. */
    public function execute(): void
    {
        // Active le support de session
        session_start();

        //Charge la liste de catégories
        $listCategory = LibBlog::listCategory();
        $this->addViewArg("listCategory", $listCategory);

        // Exécute le code spécifique au controller 'enfant'
        $this->do();

        // Rend la vue
        $this->renderView();
    }

    /** Rends la vue. */
    protected function renderView(): void
    {
        if ($this->getViewFile() != null) {

            // NOTE les variables exposées à la vue sont accessibles avec $args['nomDeMaVariable']
            $args = $this->viewArgs;

            // Expose à la vue :
            // - le titre de page
            // - les informations de SESSION
            $args['pageTitle'] = $this->getPageTitle();
            $args['session'] = $_SESSION;

            include_once $_SERVER['DOCUMENT_ROOT'] . '/view/_header.php';
            include_once $_SERVER['DOCUMENT_ROOT'] . $this->getViewFile();
            include_once $_SERVER['DOCUMENT_ROOT'] . '/view/_footer.php';
        }
    }

    /** Ajoute un argument sous forme de clé/valeur, rendu disponible dans la vue. */
    protected function addViewArg(string $key, $value): void
    {
        $this->viewArgs[$key] = $value;
    }

    /** Redirige vers une URL. */
    protected function redirectTo(string $url): void
    {
        header('Location: ' . $url);
        exit();
    }
}
