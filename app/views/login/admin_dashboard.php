<?php include __DIR__ . '/../layout/header.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chu Admin</title>
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

    h2 {
        color: white;
        text-align: center;
        margin-top: 250px;
    }

    p {
        color: white;
        text-align: center;
        font-size: 20px;
    }
</style>

<body>
    <div class="container mt-1">
        <h2>Chào quản trị viên, <?= $_SESSION['user'] ?>!</h2>
        <p>Đây là trang quản trị hệ thống.</p>
    </div>
</body>

</html>