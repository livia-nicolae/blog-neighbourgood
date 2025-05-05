<?php

namespace App\Ctrl\Core;

// Permet de ne plus être obligé de faire cet import dans chaque controlleur :) !
require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/_core/ctrl.php';

/** Routeur (très) 'naïf'. */
class Router
{
    /** Routes. */
    private $routes = [];

    /** Constructeur. */
    public function __construct()
    {
        // Référence toutes les routes de l'application - à adapter 
        $this->routes['/'] = '/ctrl/welcome.php';
        // $this->routes['/location-show'] = '/ctrl/location/show.php';
        // $this->routes['/location-add-display'] = '/ctrl/location/location-add-display.php';
    }

    /** Inclus le controller de la route demandée.*/
    public function route(): void
    {
        // Lit le chemin de l'URL demandée
        $url = parse_url($_SERVER['REQUEST_URI'])['path'];

        // Interprête/exécute le code du controller ciblé
        $ctrlFile = $this->routes[$url];
        include_once $_SERVER['DOCUMENT_ROOT'] . $ctrlFile;
    }
}
$router = new Router();
$router->route();
