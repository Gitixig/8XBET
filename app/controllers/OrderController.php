<?php
require_once __DIR__ . '/../models/orderModel.php';
class OrderController
{
    public function history()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            $config = require './config.php';
            header("Location: " . $config['baseURL'] . "user/login");
            exit;
        }

        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByUserId($_SESSION['user_id']);

        $config = require './config.php';
        $baseURL = $config['baseURL'];

        include '../../app/views/Order/history.php';
    }
    public function checkout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        require_once __DIR__ . '/../../app/models/OrderModel.php';
        require_once __DIR__ . '/../../app/models/ProductModel.php';

        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        if (!isset($_SESSION['user_id'])) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            header('Location: /du_an/8XBET/index.php?controller=auth&action=login');
            exit;
        }

        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $product = $productModel->getProductById($item['product_id']);
            $total += $product['price'] * $item['quantity']; // Tính tổng tiền
        }

        // Tạo đơn hàng trong bảng orders
        $orderId = $orderModel->createOrder($_SESSION['user_id'], $total);

        // Lưu các chi tiết đơn hàng trong bảng order_items
        foreach ($_SESSION['cart'] as $item) {
            $product = $productModel->getProductById($item['product_id']);
            $orderModel->addOrderItem($orderId, $item['product_id'], $item['quantity'], $product['price']);
        }

        // Xóa giỏ hàng
        unset($_SESSION['cart']);

        // Hiển thị thông báo thành công hoặc chuyển hướng về trang xác nhận
        include __DIR__ . '/../views/order/checkout_success.php';
    }
}
?>