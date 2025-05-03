<?php

require_once __DIR__ . '/../../config.php';

class StadiumModel
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM stadiums ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll((PDO::FETCH_ASSOC));
    }

    public static function create($name, $capacity, $country, $price, $image)
    {
        $dbConfig = include __DIR__ . '/../../config/config.php';
        $pdo = new PDO(
            "mysql:host={$dbConfig['db']['host']};dbname={$dbConfig['db']['name']}",
            $dbConfig['db']['username'],
            $dbConfig['db']['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO stadiums (name, capacity, country, price, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $capacity, $country, $price, $image]);
    }


    public function getStadiumByField($field, $value)
    {
        $allowedFields = ['id', 'name', 'capacity', 'country', 'price', 'image'];
        if (!in_array($field, $allowedFields)) {
            throw new InvalidArgumentException("Invalid field: $field");
        }

        $stmt = $this->db->prepare("SELECT `id`, `name`, `capacity`, `country`, `price`, `image` FROM `stadiums` WHERE {$field} = ?");
        $stmt->execute([$value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function updateStadium($id, $name, $capacity, $country, $price, $image)
    {
        $stmt = $this->db->prepare("UPDATE stadiums SET name = ?, capacity = ?, country = ?, price = ?, image = ? WHERE id = ?");
        return $stmt->execute([$name, $capacity, $country, $price, $image, $id]);
    }




    public function getStadiumById($id)
    {
        $stmt = $this->db->prepare("SELECT `id`, `name`, `capacity`, `country`, `price`, `image` FROM `stadiums` WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function topStadium()
    {
        $stmt = $this->db->prepare("SELECT * FROM stadiums ORDER BY price DESC LIMIT 3");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteStadium($id)
    {
        $stmt = $this->db->prepare("DELETE FROM stadiums WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
