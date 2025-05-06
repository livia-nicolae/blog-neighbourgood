<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $args['pageTitle'] ?></title>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <!-- Page d'accueil -->
                <li><a href="/ctrl/public.php">Page d'accueil</a></li>

                <!-- S'inscrire -->
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li><a href="/ctrl/register-display.php">S'inscrire</a></li>
                <?php } ?>

                <!-- Se connecter -->
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li><a href="/ctrl/login-display.php">Se connecter</a></li>
                <?php } ?>

                <!-- Visualiser mon profil -->
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="/ctrl/profile.php"><?= $_SESSION['user']['email'] ?></a></li>
                <?php } ?>

                <!-- Ajouter un article -->
               
                    <li><a href="/ctrl/article-add-display.php">Ajouter un article</a></li>
             
                <!-- Se déconnecter -->
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="/ctrl/logout.php">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </nav>
        <h1>Bienvenue sur NeighbourGood Marseille !</h1>
        <p>Votre source d'informations et d'histoires locales au cœur de nos quartiers.</p>
    </header>