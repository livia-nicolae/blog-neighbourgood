<?php
namespace App\Ctrl\Login;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Core\Ctrl;
use App\Model\Lib\USER as LibUser;

// Affiche la page d'enregistrement 
class UserLoginDisplay extends Ctrl
{
 /** @Override */
 public function getPageTitle(): ?string
 {
     return 'Se connecter';
 }

  /** @Override */
  public function getViewFile(): ?string
  {
      return '/view/login.php';
  }

    /** @Override */
    public function do(): void
    { 
        //Ne fait rien
    }
}
    // Exécute le Controlleur
    $ctrl = new UserLoginDisplay();
    $ctrl->execute();