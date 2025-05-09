<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg" style="background-color: #B22222;">
        <div class="container d-flex align-items-center">
            <button class="navbar-toggler text-white border-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2"></i>
            </button>

            <a class="navbar-brand d-flex align-items-center" href="../main-menu/Menu.php">
                <img src="../../../public/img/img-logo/8XBET.png" style="width: 70px;" alt="Logo">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link text-white" href="../main-menu/CLB.php"><b>CLB</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>SÂN VẬN ĐỘNG</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>HLV</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TIN TỨC</b></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b style="color: white;">SIGN IN</b>
                        </a>
                        <ul class="dropdown-menu" style="background-color:rgb(240, 13, 13);">
                            <li><a class="dropdown-item" href="../login/login.php"> <b style="color: white;">LOGIN</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../add_User/add_User.php"> <b style="color: white;">SINUP</b></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <a class="nav-link text-white me-3 d-flex align-items-center" href="../main-menu/Search.php">
                <b>Search</b>
                <i class="bi bi-search fs-4"></i>
            </a>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>