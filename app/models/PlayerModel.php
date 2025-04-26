<?php

require_once __DIR__ . '/../../config/config.php';

class PlayerModel
{   private $db;
    public function __construct() {
        $this->db=Database::connect();
    }
    public function getAll(){
        $stmt=$this->db->prepare("SELECT * FROM players ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function create($name, $dob, $country, $height, $price, $position, $avatar)
    {
        $dbConfig = include __DIR__ . '/../../config/config.php';
        $pdo = new PDO(
            "mysql:host={$dbConfig['db']['host']};dbname={$dbConfig['db']['name']}",
            $dbConfig['db']['username'],
            $dbConfig['db']['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO players (name, dob, country, height, price, position, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $dob, $country, $height, $price, $position, $avatar]);
    }
}
