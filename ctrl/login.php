<?php

namespace App\Ctrl\Login;


// Charge les bibliothèque de fonctions
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Core\Ctrl;
use App\Model\Lib\USER as LibUser;

/** Compare les données saisies dans le formulaire avec celles de la BDD. */

class UserLogin extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Connexion reussie';
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
        $email = $_POST['myEmail'];
        $password = $_POST['myPassword'];

        // Recherche un Utilisateur d'après son email
        $userBDD = LibUser::getAccount($email);

        if ($userBDD != null) {

            // Si la fonction password_verify vérifie que le mot de passe stocké dans la BDD et le mot de passe saisi par l'Utilisateur sont identiques
            if (password_verify($password, $userBDD['passwordHash']) || $password == $userBDD['password']) {

                // - stocke l'Utilisateur en SESSION
                $_SESSION['user'] = $userBDD;

                // - verifie s'il s'agit d'un utilisateur admin
                if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin') {
                    header('Location: ' . '/ctrl/admin.php');
                    exit();
                } else {
                    // - redirige vers la page de Profil
                                     header('Location: ' . '/ctrl/profile.php');
                    exit();
                }

                // - ajoute une notification de succès
                $_SESSION['msg']['success'] = 'Connexion réussie.';
            }
        }

        // Ajoute une notification d'avertissement
        $_SESSION['msg']['warning'] = 'Erreur de connexion.';

        // Redirige vers le formulaire de connexion
        header('Location: ' . '/ctrl/login-display.php');
    }
}

// Exécute le Controlleur
$ctrl = new UserLogin();
$ctrl->execute();
