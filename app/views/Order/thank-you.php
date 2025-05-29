<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cảm ơn bạn</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
            padding-top: 70px;
            /* Dành chỗ cho menu sticky */
        }

        .thankyou-box {
            background: #fff;
            padding: 40px 35px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 480px;
            margin: 0 auto;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #333;
        }

        .success-message {
            color: green;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .btn-continue {
            display: inline-block;
            background-color: #198754;
            color: white;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-continue:hover {
            background-color: #145c32;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Menu sticky trên cùng -->
    <nav class="sticky-top bg-white shadow-sm" style="z-index: 1030;">
        <?php include __DIR__ . '/../main-menu/Menu.php'; ?>
    </nav>

    <div class="thankyou-box mt-5">
        <h2>Cảm ơn bạn đã đặt hàng!</h2>
        <p>Đơn hàng của bạn đã được xác nhận và chúng tôi sẽ sớm liên hệ với bạn.</p>

        <?php if (!empty($_SESSION['success_message'])): ?>
            <p class="success-message"><?= htmlspecialchars($_SESSION['success_message']); ?></p>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <a href="/du_an/8XBET/app/views/product/Home.php" class="btn-continue">Tiếp tục mua sắm</a>
    </div>

</body>

</html>