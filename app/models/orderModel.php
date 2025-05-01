<?php

require_once __DIR__ . '/../../config/database.php';

class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Tạo đơn hàng mới
     * @param int $userId
     * @param float $total
     * @return int
     */
    public function createOrder($userId, $total)
    {
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, total_price, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$userId, $total]);
        return $this->db->lastInsertId(); // Lấy ID của đơn hàng vừa tạo
    }

    /**
     * Thêm chi tiết đơn hàng
     * @param int $orderId
     * @param int $productId
     * @param int $quantity
     * @param float $price
     */
    public function addOrderItem($orderId, $productId, $quantity, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orderId, $productId, $quantity, $price]);
    }

    /**
     * Lấy danh sách đơn hàng của người dùng
     * @param int $userId
     * @return array
     */
    public function getOrdersByUserId($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy chi tiết đơn hàng
     * @param int $orderId
     * @return array
     */
    public function getOrderItems($orderId)
    {
        $stmt = $this->db->prepare("SELECT oi.*, p.name AS product_name 
                                    FROM order_items oi
                                    JOIN products p ON oi.product_id = p.id
                                    WHERE oi.order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrdersWithDetails($userId)
    {
        // Lấy danh sách đơn hàng của người dùng
        $orders = $this->getOrdersByUserId($userId);

        // Duyệt qua từng đơn hàng để lấy chi tiết sản phẩm
        foreach ($orders as &$order) {
            $order['items'] = $this->getOrderItems($order['id']);
        }

        return $orders;
    }
}