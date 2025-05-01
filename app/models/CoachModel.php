<?php

require_once __DIR__ . '/../../config.php';

class CoachModel
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getCoachById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM coaches WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM coaches ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function create($name, $dob, $country, $formation, $play_style, $price, $avatar)
    {
        $dbConfig = include __DIR__ . '/../../config/config.php';
        $pdo = new PDO(
            "mysql:host={$dbConfig['db']['host']};dbname={$dbConfig['db']['name']}",
            $dbConfig['db']['username'],
            $dbConfig['db']['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO coaches(name, dob, country,formation,play_style, price, avatar) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $dob, $country, $formation, $play_style, $price, $avatar]);
    }
}
