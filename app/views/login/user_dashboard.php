<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/../main-menu/Menu.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .menueff-button {
        display: inline-block;
        padding: 15px 30px;
        font-size: 16px;
        color: rgb(89, 118, 18);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: rgb(190, 193, 195);
        border-radius: 10px;
        box-shadow: 5px 5px 10px #a3b1c6, -5px -5px 10px #ffffff;
        text-align: center;
        margin-bottom: 20px;
    }

    .menueff-button:active {
        background-color: #d1d9e6;
        border: 1px solid rgb(240, 244, 249);
    }

    .menueff-button:hover {
        background-color: white;
        color: black;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .text-center {
        text-align: center;
    }
</style>

<body class="bg-light text-dark">
    <div class="container mt-5">
        <h1 class="text-center">Thông tin người dùng </h1>
        <div class="container mt-5">
            <h2>Xin chào, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
            <p>Chào mừng bạn đến với trang người dùng.</p>
        </div>

        <div class="text-center mt-4">
            <form action="/du_an/8XBET/index.php?controller=auth&action=logout" method="POST">
                <button type="submit" class="menueff menueff-button">Đăng xuất</button>
            </form>
        </div>
        <?php include __DIR__ . '/../layout/footer.php'; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>