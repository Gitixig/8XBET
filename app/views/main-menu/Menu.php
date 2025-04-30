<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['user'] ?? null;
$role = $_SESSION['role'] ?? null;

$config = include __DIR__ . '../../../../config.php';
$base_url = $config['base_url'];
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manchester United</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<style>
    .nav-link {
        position: relative;
        text-decoration: none;
        color: white;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #FFD700;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -5px;
        width: 0;
        height: 2px;
        background-color: rgb(250, 249, 244);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #B22222;
        color: white;
    }

    .dropdown-menu .dropdown-item {
        color: white;
    }

    .navbar-nav .nav-item {
        margin-right: 10px;
    }

    .navbar-nav .nav-link {
        padding-left: 10px;
        padding-right: 10px;
    }

    .dropdown-menu .dropdown-item.btn-danger {
        background-color: #DC3545;
        /* Màu đỏ */
        color: white;
    }

    .dropdown-menu .dropdown-item.btn-danger:hover {
        background-color: #B22222;
        /* Màu đỏ đậm */
        color: white;
    }
</style>


<body>

    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #B22222;">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= $base_url; ?>/app/views/product/Home.php">
                <img src="<?= $base_url; ?>/public/img/img-logo/logo.png" style="width: 60px;" alt="Logo">
            </a>
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>/app/views/Home/Home.php"><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TTCN</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>/app/views/list_player/list_player.php"><b>CẦU THỦ</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>CLB</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>/app/views/Stadiums/Stadium.php"><b>SÂN VẬN ĐỘNG</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= $base_url; ?>/app/views/Coach/coach.php"><b>HLV</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TIN TỨC</b></a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <a class="nav-link text-white me-2" href="<?= $base_url; ?>/app/views/main-menu/Search.php">
                        <i class="bi bi-search fs-5"></i> <b>Search</b>
                    </a>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <form method="POST" action="/../du_an/8XBET/app/views/carts/index.php"
                            class="d-flex">
                            <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">
                                    <?= array_sum(array_column($_SESSION['cart'] ?? [], 'quantity')) ?>
                                </span>
                            </button>
                        </form>
                        <div class="user">
                            <a class="btn btn-light" href="<?= $base_url; ?>/app/views/login/user_dashboard.php" role="button">
                                <i class="bi-emoji-sunglasses me-1"></i> <?= htmlspecialchars($_SESSION['user']) ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="btn btn-outline-light me-2" href="<?= $base_url; ?>/app/views/login/login.php">LOGIN</a>
                        <a class="btn btn-warning" href="<?= $base_url; ?>/app/views/add_User/add_User.php">SIGN UP</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>