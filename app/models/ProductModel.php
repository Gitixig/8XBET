<?php
require_once __DIR__ . '/../../config/database.php';
class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM v_products ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProduct($id ,$name, $price, $type)
    {
        $sql = "INSERT INTO v_products (id, name, price, type) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id, $name, $price, $type]);
    }

    public function deleteProduct($productId)
    {
        $sql = "DELETE  FROM v_products
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$productId]);
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM v_products WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
