<?php

require_once __DIR__ . '/../models/OrderModel.php';
require_once __DIR__ . '/../models/ProductModel.php';
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";
// exit;
class OrderController
{
    /**
     * Hiển thị danh sách đơn hàng của người dùng
     */
    public function history()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersWithDetails($_SESSION['user_id']);

        include __DIR__ . '/../views/Order/history.php';
    }

    /**
     * Xử lý tạo đơn hàng
     */


    public function checkout()
    {
        include __DIR__ . '/../views/Order/checkout_success.php';
    }

    public function confirm()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $cartItems = $_SESSION['cart'] ?? [];

        if (empty($cartItems)) {
            header("Location: index.php?controller=Cart&action=index");
            exit;
        }

        // 👉 Đây là nơi bạn có thể thêm logic lưu đơn hàng vào database
        // Ví dụ: Lưu vào bảng `orders` và `order_items`

        // Sau khi xác nhận, xóa giỏ hàng
        unset($_SESSION['cart']);

        // Chuyển sang trang cảm ơn
        include __DIR__ . '/../views/Order/thank-you.php';
    }
    public function detail(){
           if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $ProductModel = new ProductModel();
        $order=$ProductModel->getProductById('id');
}
}