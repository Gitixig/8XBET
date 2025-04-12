<?php

require_once __DIR__ . '/../../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function addUser($fullname, $username, $password)
    {
        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return false; 
        }

        $stmt = $this->db->prepare("INSERT INTO users (fullname ,username, password) VALUES (? ,?, ?)");
        return $stmt->execute([$fullname, $username, $hash_password]);
    }

    public static function authenticate($username, $password)
    {
        $db = Database::connect();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }

        return false; 
    }
}