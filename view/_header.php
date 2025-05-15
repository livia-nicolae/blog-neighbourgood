<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $args['pageTitle'] ?></title>
    <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
    <header>
        <h1>Bienvenue sur NeighbourGood Marseille !</h1>
        <p>Votre source d'informations et d'histoires locales au cœur de nos quartiers.</p>
        <nav>
            <ul>
                <!-- Page d'accueil -->
                <?php if ($_SERVER['REQUEST_URI'] !== '/ctrl/public.php') { ?>
                    <li><a href="/ctrl/public.php">Derniers articles</a></li>
                <?php } ?>

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
                    <li>
                        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                            <a href="/ctrl/admin.php"><?= $_SESSION['user']['email'] ?> (Admin)</a>
                        <?php endif; ?>
                        <?php if (!(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin')): ?>
                            <a href="/ctrl/profile.php"><?= $_SESSION['user']['email'] ?></a>
                        <?php endif; ?>
                    </li>
                <?php } ?>

                <!-- Ajouter un article -->
                <li>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <?php if (!isset($_SESSION['user']['is_banned']) || $_SESSION['user']['is_banned'] == false): ?>
                            <a href="/ctrl/article-add-display.php">Ajouter un article</a>
                        <?php else : ?>
                            <a href="/ctrl/profile.php">Voir mon profil</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a href="/ctrl/login-display.php">Connectez-vous</a>
                    <?php endif; ?>
                </li>
                <!-- Catégories -->
                <li> Catégories
                    <ul>
                        <?php foreach ($args['listCategory'] as $category): ?>
                            <li>
                                <a href="/ctrl/category.php?id=<?= $category['id'] ?>">
                                    <?= ($category['name']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- Se déconnecter -->
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><a href="/ctrl/logout.php">Se déconnecter</a></li>
                <?php } ?>
            </ul>
        </nav>

    </header>