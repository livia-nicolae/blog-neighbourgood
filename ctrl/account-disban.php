<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Core\Ctrl;
use App\Model\Lib\USER as LibUser;

//Ajouter un article
class UserDisban extends Ctrl
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
        // Vérifier si un admin est connecté
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            $this->redirectTo('/ctrl/public.php');
            exit();
        }
        // Récupérer l'ID de l'utilisateur
        $id = $_GET['id'];

        // Publie l'article 
        LibUser::disbanAccount($id);

        // Redirige vers la page d'admin
        $this->redirectTo('/ctrl/admin.php');
    }
}

// Exécute le Controlleur
$ctrl = new UserDisban();
$ctrl->execute();
