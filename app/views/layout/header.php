<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['user'] ?? null;
$role = $_SESSION['role'] ?? null;

require_once __DIR__ . '/../../../config/config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<style>
    body {
        margin: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-image: url('/public/img_admin_login/1742660101_download.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .navbar-nav {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .navbar-nav .nav-item {
        margin: 0 10px;
    }

    .navbar-nav .nav-link:hover {
        color: #ffc107 !important;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
                    <?php if ($role === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link text-warning" href="/../du_an/8XBET/app/views/add_player/add_player.php">Thêm cầu thủ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="/index.php?controller=user&action=list">Danh sách người dùng</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="/index.php?controller=club&action=add">Thêm câu lạc bộ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="/index.php?controller=club&action=list">Danh sách câu lạc bộ</a></li>
                    <?php endif; ?>
                    <?php if ($username): ?>
                        <li class="nav-item"><a class="nav-link" href="/du_an/8XBET/index.php?controller=auth&action=logout">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/du_an/8XBET/index.php?controller=auth&action=login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>