<?php
require_once 'config/Database.php';

class Admin
{
    public static function authenticate($username, $password)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM admins WHERE username = ? AND password = SHA2(?, 256)");
        $stmt->execute([$username, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
