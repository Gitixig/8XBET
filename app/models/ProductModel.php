<?php

require_once __DIR__ . '/../../config/database.php';

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Lấy tất cả sản phẩm
     * @return array
     */
    public function getAllProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy thông tin sản phẩm theo ID
     * @param int $id
     * @return array|false
     */

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT id, name, price FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách huấn luyện viên
     * @return array
     */
    public function getCoaches()
    {
        $stmt = $this->db->prepare("SELECT id, name AS Name, price, 'coache' AS type FROM coaches");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách cầu thủ
     * @return array
     */
    public function getPlayers()
    {
        $stmt = $this->db->prepare("SELECT id, name AS Name, Price, 'player' AS type FROM players");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách sân vận động
     * @return array
     */
    public function getStadiums()
    {
        $stmt = $this->db->prepare("SELECT id, name AS Name, price, 'stadium' AS type FROM stadium");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Đồng bộ dữ liệu từ các bảng coach, player, stadium vào bảng products
     */
    public function syncProducts()
    {
        // Lấy dữ liệu từ các bảng
        $coaches = $this->getCoaches();
        $players = $this->getPlayers();
        $stadiums = $this->getStadiums();

        // Gộp dữ liệu
        $allData = array_merge($coaches, $players, $stadiums);

        // Lưu vào bảng products
        foreach ($allData as $item) {
            $this->insertProduct($item['Name'], $item['Price'], $item['type']);
        }

        echo "Dữ liệu từ các bảng đã được đồng bộ vào bảng products.";
    }

    /**
     * Thêm sản phẩm vào bảng products
     * @param string $name
     * @param float $price
     * @param string $type
     */
    public function insertProduct($name, $price, $type)
    {
        $stmt = $this->db->prepare("INSERT INTO products (Name, Price, type) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $type]);
    }
}