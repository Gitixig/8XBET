<?php if(session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn bạn</title>
    <style>
        /* CSS đơn giản cho trang cảm ơn */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Cảm ơn bạn đã đặt hàng!</h2>
    <p>Đơn hàng của bạn đã được xác nhận và chúng tôi sẽ sớm liên hệ với bạn.</p>
    <?php if (isset($_SESSION['success_message'])): ?>
        <p style="color: green;"><?php echo $_SESSION['success_message']; ?></p>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    <button><a href="/du_an/8XBET/app/views/product/Home.php">Tiếp tục mua sắm</a>
</body></button>
    
</html>