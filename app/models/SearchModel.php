<?php
class SearchModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function searchPlayers($query)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE name LIKE :query");
        $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}