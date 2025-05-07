<?php

namespace App\Model\Lib;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';

use PDO;

use App\Model\Lib\Db\Lib as LibDb;

class user 
{   //Création d'un nouveau compte
    public static function createAccount($username, $email, $password, $hashedPassword): bool
    {
        $query = 'INSERT INTO account(username, email, password, hashed_password, is_banned) VALUES(:username, :email, :password, :hashed_password, 0);';
        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':hashed_password', $hashedPassword);
        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }

    //Obtient un utilisateur d'aprés son email
    public static function getAccount(string $email): ?array
    {

        $query = 'SELECT account.id, account.username, account.email, account.password, account.hashed_password, account.role, account.created_at, account.updated_at, account.is_banned FROM account WHERE account.email=:email;';

        $statement = LibDb::connect()->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            $user = null;
        }
        return $user;
    }
}