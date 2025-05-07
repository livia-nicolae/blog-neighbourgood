<?php

namespace App\Ctrl;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';

use App\Ctrl\Core\Ctrl;

// Affiche la page d'enregistrement 
class UserRegisterDisplay extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'S\'inscrire';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/register.php';
    }
    /** @Override */
    public function do(): void
    {
        //Ne fait rien
    }
}
// Exécute le Controlleur
$ctrl = new UserRegisterDisplay();
$ctrl->execute();
