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

        $stmt = $this->db->prepare("INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)");
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

    public function getUserInfo($username)
    {
        $stmt = $this->db->prepare("SELECT id, fullname, username, created_at FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers()
    {
        $stmt = $this->db->prepare("SELECT id, fullname, username, password, created_at FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteUserById($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getUserById($id)
    {
        $stmt = $this->db->prepare("SELECT id, fullname, username FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT id, fullname, username FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByFullname($fullname)
    {
        $stmt = $this->db->prepare("SELECT id, fullname, username FROM users WHERE fullname = ?");
        $stmt->execute([$fullname]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateUser($id, $fullname, $username)
    {
        $stmt = $this->db->prepare("UPDATE users SET fullname = ?, username = ? WHERE id = ?");
        return $stmt->execute([$fullname, $username, $id]);
    }
}