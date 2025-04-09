<?php
require_once 'config/Database.php';

class User
{
    public static function authenticate($username, $password)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = SHA2(?, 256)");
        $stmt->execute([$username, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
