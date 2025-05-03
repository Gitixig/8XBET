<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['admin'] ?? null;
$role = $_SESSION['role'] ?? null;
$config = include __DIR__ . '/../../../config.php';
$base_url = $config['base_url'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

        .btn-scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: block;
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            z-index: 1000;
            text-align: center;
            line-height: 50px;
        }

        .btn-scroll-top:hover {
            background-color: #e0a800;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo $base_url; ?>/app/views/login/admin_dashboard.php">
                <img src="<?php echo $base_url; ?>/public/img/img-logo/logo.png"
                    style="width: 70px; height: auto; object-fit: contain;"
                    alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">

                    <?php if ($role === 'admin'): ?>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/app/views/add_player/add_player.php">Thêm cầu thủ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/app/views/list_player/list_player_admin.php">Danh sách cầu thủ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/index.php?controller=user&action=listUsers">Danh sách người dùng</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="/index.php?controller=club&action=add">Thêm câu lạc bộ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="/index.php?controller=club&action=list">Danh sách câu lạc bộ</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/index.php?controller=coach&action=add">Thêm câu HLV</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/index.php?controller=coach&action=coach_admin">Danh sách HLV</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/index.php?controller=stadium&action=add">Thêm Sân Bóng </a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="<?php echo $base_url; ?>/index.php?controller=stadium&action=stadium_admin">Danh sách Sân Bóng </a></li>
                    <?php endif; ?>
                    <?php if ($username): ?>
                        <li class="nav-item"><a class="nav-link" href="/du_an/8XBET/index.php?controller=auth&action=login">Login</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/du_an/8XBET/index.php?controller=auth&action=logout">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <a href="#" class="btn-scroll-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>