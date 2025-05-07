<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';

use App\Ctrl\Core\Ctrl;

class LogOut extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Deconnexion';
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        // Redirige vers la page d'accueil
        return null;
    }
    /** @Override */
    public function do(): void
    {
        // Vide la SESSION
        $_SESSION = [];

        // - ajoute une notification de succès
        $_SESSION['msg']['success'] = 'Déconnexion effectuée.';

        // Redirige vers la page d'accueil
        $this->redirectTo('/ctrl/public.php');
    }
}

// Exécute le Controlleur
$ctrl = new LogOut();
$ctrl->execute();
