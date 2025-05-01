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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.";
            return;
        }

        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        $total = 0;

        try {
            foreach ($_SESSION['cart'] as $key => $item) {
                // Kiểm tra dữ liệu giỏ hàng
                if (!isset($item['id'], $item['type'], $item['quantity'])) {
                    error_log("Mục giỏ hàng không hợp lệ: " . print_r($item, true));
                    continue; // Bỏ qua mục không hợp lệ
                }

                // Lấy thông tin sản phẩm từ cơ sở dữ liệu
                $product = $productModel->getProductById($item['id']);
                if (!$product || !isset($product['price'])) {
                    error_log("Không tìm thấy sản phẩm hoặc giá không hợp lệ: " . print_r($item, true));
                    throw new Exception("Sản phẩm không tồn tại hoặc giá không hợp lệ.");
                }

                $total += $product['price'] * $item['quantity'];
            }

            if ($total == 0) {
                echo "Không có sản phẩm hợp lệ trong giỏ hàng.";
                return;
            }

            // Tạo đơn hàng
            $orderId = $orderModel->createOrder($_SESSION['user_id'], $total);

            // Thêm chi tiết đơn hàng
            foreach ($_SESSION['cart'] as $key => $item) {
                if (!isset($item['id'], $item['type'], $item['quantity'])) {
                    continue; // Bỏ qua mục không hợp lệ
                }

                $product = $productModel->getProductById($item['id']);
                if (!$product || !isset($product['price'])) {
                    continue; // Bỏ qua sản phẩm không tồn tại hoặc giá không hợp lệ
                }

                $orderModel->addOrderItem($orderId, $item['id'], $item['quantity'], $product['price']);
            }

            // Xóa giỏ hàng sau khi thanh toán
            unset($_SESSION['cart']);
            include __DIR__ . '/../views/Order/checkout_success.php';
        } catch (Exception $e) {
            error_log("Lỗi khi xử lý thanh toán: " . $e->getMessage());
            echo "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }
}