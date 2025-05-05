<?php

namespace App\Model\Lib\Db;

use PDO;

// Bibliothèque de fonctions associées à la BDD.

class Lib
{
    // Founrit une connexion à la BDD.
   
    public static function connect(): PDO
    {
        //Lit les informations dans le fichier de configuration
        $db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/cfg/db.ini');


        // Établit la connexion à la BDD
        $dsn = 'mysql:host=' . $db['host'] . ';port=' . $db['port'] . ';dbname=' . $db['name'];
        $pdo = new PDO($dsn, $db['user'], $db['password']);

        return $pdo;
    }
}
