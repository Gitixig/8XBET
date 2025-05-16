<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../core/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../../core/PHPMailer/SMTP.php';
require_once __DIR__ . '/../../core/PHPMailer/Exception.php';

function sendOrderConfirmationEmailToAdmin($orderData) {
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host       = '90zuka09@gmail.com'; // Thay bằng SMTP server của bạn (ví dụ: smtp.gmail.com)
        $mail->SMTPAuth   = true;
        $mail->Username   = '90zuka09@gmail.com'; // Thay bằng email admin của bạn
        $mail->Password   = 'Nhat009pk'; // Thay bằng mật khẩu email admin của bạn
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Hoặc PHPMailer::ENCRYPTION_SMTPS
        $mail->Port       = 587; // Hoặc 465 nếu dùng SMTPS
        $mail->CharSet    = 'UTF-8';

        // Người gửi và người nhận
        $mail->setFrom('90zuka09@gmail.com', '8XBET'); // Email và tên người gửi
        $mail->addAddress('90zuka09@gmail.com', 'Admin_Nhật');     // Email và tên người nhận (admin)
        // $mail->addCC('another_admin@example.com'); // Gửi thêm bản sao cho người khác (tùy chọn)

        // Nội dung email
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Đơn hàng mới từ website 8XBET' . $orderData['order_id'];

        $body = '<p>Xin chào Admin,</p>';
        $body .= '<p>Một đơn hàng mới đã được đặt trên website của bạn với mã đơn hàng: <strong>#' . $orderData['order_id'] . '</strong>.</p>';
        $body .= '<h3>Thông tin khách hàng:</h3>';
        $body .= '<p><strong>Tên:</strong> ' . htmlspecialchars($orderData['customer_name']) . '</p>';
        $body .= '<p><strong>Email:</strong> ' . htmlspecialchars($orderData['customer_email']) . '</p>';
        $body .= '<p><strong>Điện thoại:</strong> ' . htmlspecialchars($orderData['customer_phone']) . '</p>';
        $body .= '<p><strong>Địa chỉ giao hàng:</strong> ' . htmlspecialchars($orderData['shipping_address']) . '</p>';
        $body .= '<h3>Chi tiết đơn hàng:</h3>';
        $body .= '<table style="width: 100%; border-collapse: collapse;">';
        $body .= '<thead><tr><th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Sản phẩm</th><th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Số lượng</th><th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Giá</th><th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Thành tiền</th></tr></thead>';
        $body .= '<tbody>';
        foreach ($orderData['items'] as $item) {
            $body .= '<tr>';
            $body .= '<td style="border: 1px solid #ddd; padding: 8px;">' . htmlspecialchars($item['name']) . '</td>';
            $body .= '<td style="border: 1px solid #ddd; padding: 8px; text-align: right;">' . htmlspecialchars($item['quantity']) . '</td>';
            $body .= '<td style="border: 1px solid #ddd; padding: 8px; text-align: right;">' . number_format($item['price']) . ' VNĐ</td>';
            $body .= '<td style="border: 1px solid #ddd; padding: 8px; text-align: right;">' . number_format($item['price'] * $item['quantity']) . ' VNĐ</td>';
            $body .= '</tr>';
        }
        $body .= '</tbody>';
        $body .= '<tfoot><tr><td colspan="3" style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold;">Tổng tiền:</td><td style="border: 1px solid #ddd; padding: 8px; text-align: right; font-weight: bold;">' . number_format($orderData['total_amount']) . ' VNĐ</td></tr></tfoot>';
        $body .= '</table>';
        $body .= '<p><strong>Phương thức thanh toán:</strong> ' . htmlspecialchars($orderData['payment_method']) . '</p>';
        $body .= '<p>Vui lòng kiểm tra và xử lý đơn hàng này trong thời gian sớm nhất.</p>';
        $body .= '<p>Trân trọng,<br>Hệ thống Website Của Bạn</p>';

        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body); // Nội dung thuần văn bản cho các trình đọc email không hỗ trợ HTML

        $mail->send();
        return true; // Gửi email thành công
    } catch (Exception $e) {
        // Ghi log lỗi hoặc xử lý khác
        error_log("Lỗi gửi email thông báo đơn hàng: " . $mail->ErrorInfo);
        return false; // Gửi email thất bại
    }
}

?>