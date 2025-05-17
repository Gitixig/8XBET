<?php
require_once __DIR__ . '/../../config/database.php'; // Kết nối đến database
require_once __DIR__ . '/../helpers/mail_helper.php'; // Import hàm gửi email


use PHPMailer\PHPMailer\PHPMailer; // Các class của PHPMailer
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CheckoutController
{
    public function processPayment()
    {
        global $pdo; // Sử dụng biến kết nối PDO đã được tạo

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Checkout'])) {
            // 1. Lấy dữ liệu từ form thanh toán
            $customerName = $_POST['customerName'];
            $customerEmail = $_POST['customerEmail'];
            $customerPhone = $_POST['customerPhone'];
            $shippingAddress = $_POST['shippingAddress'];
            $paymentMethod = $_POST['paymentMethod'];
            $totalAmount = $_POST['totalAmount'];

            // 2. Bắt đầu transaction (để đảm bảo tính toàn vẹn dữ liệu)
           $pdo = Database::connect();
           $pdo->beginTransaction();

            try {
                // 3. Lưu thông tin đơn hàng vào bảng 'orders'
                $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, shipping_address, payment_method, total_amount, order_date) VALUES (:name, :email, :phone, :address, :payment, :total, NOW())");
                $stmt->bindParam(':name', $customerName);
                $stmt->bindParam(':email', $customerEmail);
                $stmt->bindParam(':phone', $customerPhone);
                $stmt->bindParam(':address', $shippingAddress);
                $stmt->bindParam(':payment', $paymentMethod);
                $stmt->bindParam(':total', $totalAmount);
                $stmt->execute();

                $orderId = $pdo->lastInsertId(); // Lấy ID của đơn hàng vừa được tạo

                // 4. Lưu chi tiết sản phẩm của đơn hàng vào bảng 'order_items'
                $cartItems = $_SESSION['cart'] ?? []; // Giả sử thông tin giỏ hàng được lưu trong session
                foreach ($cartItems as $item) {
                    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, product_name, quantity, price) VALUES (:order_id, :product_id, :product_name, :quantity, :price)");
                    $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
                    $stmt->bindParam(':product_id', $item['id'], PDO::PARAM_INT); // Giả sử $item['id'] là ID sản phẩm
                    $stmt->bindParam(':product_name', $item['name']);
                    $stmt->bindParam(':quantity', $item['quantity'], PDO::PARAM_INT);
                    $stmt->bindParam(':price', $item['price'], PDO::PARAM_INT);
                    $stmt->execute();
                }

                // 5. Nếu mọi thứ thành công, commit transaction
                $pdo->commit();

                // 6. Lấy thông tin đơn hàng để gửi email xác nhận
                $orderData = $this->getOrderDetails($orderId);
                $orderItems = $this->getOrderItems($orderId);
                $emailData = [
                    'order_id' => $orderData['id'],
                    'customer_name' => $orderData['customer_name'],
                    'customer_email' => $orderData['customer_email'],
                    'customer_phone' => $orderData['customer_phone'],
                    'shipping_address' => $orderData['shipping_address'],
                    'payment_method' => $orderData['payment_method'],
                    'total_amount' => $orderData['total_amount'],
                    'items' => $orderItems
                ];

                // 7. Gọi hàm để gửi email xác nhận đến admin
                if (sendOrderConfirmationEmailToAdmin($emailData)) {
                    $_SESSION['success_message'] = "Đơn hàng của bạn đã được đặt thành công. Thông tin chi tiết đã được gửi đến email của bạn và admin.";
                    unset($_SESSION['cart']); // Xóa giỏ hàng sau khi đặt hàng thành công
                    header('Location: /du_an/8Xbet/app/views/Order/thank-you.php'); // Chuyển hướng đến trang cảm ơn
                    exit();
                } else {
                    $_SESSION['error_message'] = "Đã có lỗi xảy ra khi gửi thông báo đến admin. Vui lòng liên hệ lại sau.";
                    header('Location: checkout'); // Chuyển hướng trở lại trang thanh toán
                    exit();
                }
            } catch (Exception $e) {
                // 8. Nếu có lỗi, rollback transaction
                $pdo->rollBack();
                $_SESSION['error_message'] = "Đã có lỗi xảy ra trong quá trình xử lý đơn hàng: " . $e->getMessage();
                header('Location: checkout'); // Chuyển hướng trở lại trang thanh toán
                exit();
            }
        }
    }

    // Hàm lấy chi tiết đơn hàng từ database
    private function getOrderDetails($orderId)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT id, customer_name, customer_email, customer_phone, shipping_address, payment_method, total_amount FROM orders WHERE id = :order_id");
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm lấy danh sách sản phẩm trong đơn hàng từ database
    private function getOrderItems($orderId)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT product_name, quantity, price FROM order_items WHERE order_id = :order_id");
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>