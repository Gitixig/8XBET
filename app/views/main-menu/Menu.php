<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['user'] ?? null;
$role = $_SESSION['role'] ?? null;
?>
<?php
require_once __DIR__ . '/../../../config/config.php';
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
    .nav-link.dropdown-toggle::after {
        border-top-color: white !important;
    }

    .dropdown-menu {
        transition: all 0.3s ease-in-out;
        overflow: hidden;
    }

    .dropdown-menu:hover {
        transform: scale(1.05);
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
</style>


<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #B22222;">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler text-white border-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2"></i>
            </button>
            <a class="navbar-brand d-flex align-items-center" href="/../du_an/8XBET/app/views/product/Home.php">
                <img src="/du_an/8XBET/public/img/img-logo/logo.png" style="width: 70px;" alt="Logo">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link text-white active" href="/du_an/8XBET/app/views/Product/Home.php"><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white active" href="#"><b>TTCN</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/../du_an/8XBET/app/views/list_player/list_player.php"><b>CẦU THỦ</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>CLB</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/../du_an/8XBET/app/views/Stadiums/Stadium.php"><b>SÂN VẬN ĐỘNG</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>HLV</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TIN TỨC</b></a></li>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b style="color: white;">SIGN IN</b>
                            </a>
                            <ul class="dropdown-menu" style="background-color:rgb(240, 13, 13);">
                                <li><a class="dropdown-item" href="/du_an/8XBET/app/views/login/login.php"> <b style="color: white;">LOGIN</b></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/du_an/8XBET/app/views/add_User/add_User.php"> <b style="color: white;">SIGN UP</b></a></li>

                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['role']) === "admin") { ?>
                        <li class="nav-item"><a class="nav-link text-white" href="/du_an/8XBET/app/views/List_player/list_player.php"><b>Add player</b></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#"><b>Add CLB</b></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#"><b>Add stadium</b></a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#"><b>Add HLV</b></a></li>
                    <?php } ?>
                </ul>
            </div>
            <a class="nav-link text-white me-3 d-flex align-items-center" href="../main-menu/Search.php">
                <b>Search</b>
                <i class="bi bi-search fs-4"></i>
            </a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>