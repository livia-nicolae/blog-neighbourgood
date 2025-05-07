<?php

namespace App\Model\Lib;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';

use PDO;

use App\Model\Lib\Db\Lib as LibDb;

class user 
{
    public static function createUser($username, $email, $password, $hashedPassword): bool
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
}