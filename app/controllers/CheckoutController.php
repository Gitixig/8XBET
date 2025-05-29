<?php
require_once __DIR__ . '/../../config/database.php'; // Kết nối đến database

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php'; // Composer autoload

class CheckoutController
{
    public function processPayment()
    {
        global $pdo;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Checkout'])) {
            $customerName = $_POST['customerName'];
            $customerEmail = $_POST['customerEmail'];
            $customerPhone = $_POST['customerPhone'];
            $shippingAddress = $_POST['shippingAddress'];
            $paymentMethod = $_POST['paymentMethod'];
            $totalAmount = $_POST['totalAmount'];

            $pdo = Database::connect();
            $pdo->beginTransaction();

            try {
                // Lưu đơn hàng
                $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, customer_phone, shipping_address, payment_method, total_amount, order_date) VALUES (:name, :email, :phone, :address, :payment, :total, NOW())");
                $stmt->bindParam(':name', $customerName);
                $stmt->bindParam(':email', $customerEmail);
                $stmt->bindParam(':phone', $customerPhone);
                $stmt->bindParam(':address', $shippingAddress);
                $stmt->bindParam(':payment', $paymentMethod);
                $stmt->bindParam(':total', $totalAmount);
                $stmt->execute();

                $orderId = $pdo->lastInsertId();

                // Lưu chi tiết sản phẩm
                $cartItems = $_SESSION['cart'] ?? [];
                foreach ($cartItems as $item) {
                    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, product_name, quantity, price) VALUES (:order_id, :product_id, :product_name, :quantity, :price)");
                    $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
                    $stmt->bindParam(':product_id', $item['id'], PDO::PARAM_INT);
                    $stmt->bindParam(':product_name', $item['name']);
                    $stmt->bindParam(':quantity', $item['quantity'], PDO::PARAM_INT);
                    $stmt->bindParam(':price', $item['price'], PDO::PARAM_INT);
                    $stmt->execute();
                }

                $pdo->commit();

                // Lấy lại thông tin đơn hàng và sản phẩm
                $orderData = $this->getOrderDetails($orderId);
                $orderItems = $this->getOrderItems($orderId);

                // Chuẩn bị nội dung sản phẩm cho email
                $itemList = "";
                foreach ($orderItems as $item) {
                    $itemList .= "{$item['product_name']} x {$item['quantity']} - " . number_format($item['price']) . " VNĐ<br>";
                }

                // Gửi email cho admin
                try {
                    $mailAdmin = new PHPMailer(true);
                    $mailAdmin->isSMTP();
                    $mailAdmin->Host = 'smtp.gmail.com';
                    $mailAdmin->SMTPAuth = true;
                    $mailAdmin->Username = 'thaibao250306@gmail.com'; // tài khoản gửi
                    $mailAdmin->Password = 'qseg dgnj qwxn rdpi';     // mật khẩu ứng dụng
                    $mailAdmin->SMTPSecure = 'tls';
                    $mailAdmin->Port = 587;

                    $mailAdmin->setFrom('8xbetshop@gmail.com', '8XBET Shop');
                    $mailAdmin->addAddress('thaibao123xyz@gmail.com', 'Chủ Shop'); // email admin

                    $mailAdmin->isHTML(true);
                    $mailAdmin->CharSet = 'UTF-8';
                    $mailAdmin->Subject = "Đơn hàng mới từ $customerName - Mã đơn #$orderId";
                    $mailAdmin->Body = "
                        <h2>Thông tin đơn hàng mới</h2>
                        <p><strong>Khách hàng:</strong> $customerName</p>
                        <p><strong>Email:</strong> $customerEmail</p>
                        <p><strong>Điện thoại:</strong> $customerPhone</p>
                        <p><strong>Địa chỉ:</strong> $shippingAddress</p>
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

                // Gửi email cho khách hàng
                try {
                    $mailUser = new PHPMailer(true);
                    $mailUser->isSMTP();
                    $mailUser->Host = 'smtp.gmail.com';
                    $mailUser->SMTPAuth = true;
                    $mailUser->Username = 'thaibao250306@gmail.com'; // tài khoản gửi
                    $mailUser->Password = 'qseg dgnj qwxn rdpi';     // mật khẩu ứng dụng
                    $mailUser->SMTPSecure = 'tls';
                    $mailUser->Port = 587;

                    $mailUser->setFrom('thaibao250306@gmail.com', '8XBET Shop');
                    $mailUser->addAddress($customerEmail, $customerName);

                    $mailUser->isHTML(true);
                    $mailUser->CharSet = 'UTF-8';
                    $mailUser->Subject = "Xác nhận đơn hàng của bạn tại 8XBET - Mã đơn #$orderId";
                    $mailUser->Body = "
                        <h2>Cảm ơn bạn đã đặt hàng tại 8XBET!</h2>
                        <p><strong>Khách hàng:</strong> $customerName</p>
                        <p><strong>Email:</strong> $customerEmail</p>
                        <p><strong>Điện thoại:</strong> $customerPhone</p>
                        <p><strong>Địa chỉ:</strong> $shippingAddress</p>
                        <p><strong>Phương thức thanh toán:</strong> $paymentMethod</p>
                        <hr>
                        <h4>Sản phẩm đã đặt:</h4>
                        <p>$itemList</p>
                        <p><strong>Tổng tiền:</strong> " . number_format($totalAmount) . " VNĐ</p>
                        <p>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng trong thời gian sớm nhất.</p>
                    ";
                    $mailUser->send();
                } catch (Exception $e) {
                    error_log("Lỗi gửi mail cho khách: " . $mailUser->ErrorInfo);
                }

                $_SESSION['success_message'] = "Đơn hàng của bạn đã được đặt thành công. Thông tin chi tiết đã được gửi đến email của bạn và admin.";
                unset($_SESSION['cart']);
                header('Location: /du_an/8Xbet/app/views/Order/thank-you.php');
                exit();
            } catch (Exception $e) {
                $pdo->rollBack();
                $_SESSION['error_message'] = "Đã có lỗi xảy ra trong quá trình xử lý đơn hàng: " . $e->getMessage();
                header('Location: checkout');
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