<?php


require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../libraries/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/../libraries/PHPMailer-master/src/SMTP.php';
require_once __DIR__ . '/../libraries/PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../models/OrderModel.php';
require_once __DIR__ . '/../models/ProductModel.php';

class OrderController
{
    public function history()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersWithDetails($_SESSION['user_id']);

        include __DIR__ . '/../views/Order/history.php';
    }

    public function checkout()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $cartItems = $_SESSION['cart'] ?? [];
        if (empty($cartItems)) {
            echo "Giỏ hàng trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.";
            return;
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        include __DIR__ . '/../views/Order/checkout_success.php';
    }

    public function confirm()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $cartItems = $_SESSION['cart'] ?? [];
        if (empty($cartItems)) {
            header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
            exit;
        }

        // Lấy dữ liệu từ form
        $name = $_POST['customerName'] ?? '';
        $email = $_POST['customerEmail'] ?? '';
        $phone = $_POST['customerPhone'] ?? '';
        $address = $_POST['shippingAddress'] ?? '';
        $paymentMethod = $_POST['paymentMethod'] ?? '';
        $totalAmount = 0;

        $orderModel = new OrderModel();
        $productModel = new ProductModel();

        try {
            // Tính tổng tiền
            foreach ($cartItems as $item) {
                $product = $productModel->getProductById($item['id']);
                if ($product && isset($product['price'])) {
                    $totalAmount += $product['price'] * $item['quantity'];
                }
            }

            if ($totalAmount == 0) {
                echo "Không có sản phẩm hợp lệ trong giỏ hàng.";
                return;
            }

            // Tạo đơn hàng
            $orderId = $orderModel->createOrder($_SESSION['user_id'], $totalAmount, $name, $email, $phone, $address, $paymentMethod);

            // Thêm chi tiết đơn hàng
            foreach ($cartItems as $item) {
            $product = $productModel->getProductById($item['id']);
            if ($product && isset($product['price'])) {
            // Kiểm tra tồn kho
            if ($product['quantity'] < $item['quantity']) {
                echo "Sản phẩm '{$product['name']}' không đủ hàng trong kho. Còn lại: {$product['quantity']}";
                return;
            }

            // Thêm chi tiết đơn hàng
            $orderModel->addOrderItem($orderId, $item['id'], $item['quantity'], $product['price']);

            // Trừ số lượng kho
            $productModel->decreaseQuantity($item['id'], $item['quantity']);
            }
        }


            // Chuẩn bị nội dung sản phẩm cho email
            $itemList = "";
            foreach ($cartItems as $item) {
                $itemList .= "{$item['name']} x {$item['quantity']} - " . number_format($item['price'] * $item['quantity']) . " VNĐ<br>";
            }

            // Gửi email cho shop (admin)
            try {
                $mailAdmin = new PHPMailer(true);
                $mailAdmin->isSMTP();
                $mailAdmin->Host = 'smtp.gmail.com';
                $mailAdmin->SMTPAuth = true;
                $mailAdmin->Username = 'thaibao250306@gmail.com'; // tài khoản gửi
                $mailAdmin->Password = 'iopa yqia soew ylmn';     // mật khẩu ứng dụng
                $mailAdmin->SMTPSecure = 'tls';
                $mailAdmin->Port = 587;
                $mailAdmin->CharSet = 'UTF-8';

                $mailAdmin->setFrom('thaibao250306@gmail.com', '8XBET Shop');
                $mailAdmin->addAddress('thaibao250306@gmail.com', 'Chủ Shop'); // email nhận cố định

                $mailAdmin->isHTML(true);
                $mailAdmin->Subject = "Don hang moi tu $name - Ma Don #$orderId";
                $mailAdmin->Body = "
                    <h2>Thông tin đơn hàng mới</h2>
                    <p><strong>Khách hàng:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Điện thoại:</strong> $phone</p>
                    <p><strong>Địa chỉ:</strong> $address</p>
                    <p><strong>Phương thức thanh toán:</strong> $paymentMethod</p>
                    <hr>
                    <h4>Sản phẩm:</h4>
                    <p>$itemList</p>
                    <p><strong>Tổng tiền:</strong> " . number_format($totalAmount) . " VNĐ</p>
                ";
                $mailAdmin->send();
            } catch (Exception $e) {
                error_log("Lỗi gửi mail cho admin: " . $mailAdmin->ErrorInfo);
            }

            unset($_SESSION['cart']);
            header("Location: /du_an/8XBET/index.php?controller=order&action=thankyou");
            exit;
        } catch (Exception $e) {
            echo "Lỗi xử lý đơn hàng: " . $e->getMessage();
        }
    }

    public function thankyou()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        include __DIR__ . '/../views/Order/thank-you.php';
    }
}