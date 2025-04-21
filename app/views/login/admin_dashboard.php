<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /du_an/8XBET/app/views/login/login.php");
    exit();
}
include __DIR__ . '/../main-menu/Menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        margin: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-image: url('/du_an/8XBET/public/img_admin_login/1742660101_download.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .admin-dashboard {
        margin-top: 50px;
        text-align: center;
        /* Căn giữa nội dung văn bản */
        color: white;
        display: flex;
        /* Sử dụng flexbox */
        flex-direction: column;
        /* Sắp xếp các phần tử theo cột */
        justify-content: center;
        /* Căn giữa theo chiều dọc */
        align-items: center;
        /* Căn giữa theo chiều ngang */
        height: 100vh;
        /* Chiều cao toàn màn hình */
    }

    .admin-dashboard h2 {
        margin-bottom: 20px;
    }

    .admin-options {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .admin-options a {
        display: inline-block;
        padding: 15px 30px;
        font-size: 18px;
        color: white;
        background-color: #007bff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .admin-options a:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="container admin-dashboard">
        <h2>Chào quản trị viên, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
        <p>Chào mừng bạn đến với trang quản trị hệ thống.</p>
    </div>
</body>

</html>