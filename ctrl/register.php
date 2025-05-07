<?php

namespace App\Ctrl\Reg;

// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';


use App\Ctrl\Core\Ctrl;
use App\Model\Lib\USER as LibUser;

/** Crée un nouvel utilisateur. */
class UserRegister extends Ctrl
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

        // Lit les informations saisies dans le formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        //Hache le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        //Création de nouvel utilisateur
        $newUser = LibUser::createUser($username, $email, $password, $hashedPassword);

        // Ajoute une notification de succès
        $_SESSION['msg']['success'] = 'Inscription réussite.';

        // Redirige vers le formulaire de connexion
        header('Location: ' . '/ctrl/login-display.php');
    }
}

// Exécute le Controlleur
$ctrl = new UserRegister();
$ctrl->execute();
