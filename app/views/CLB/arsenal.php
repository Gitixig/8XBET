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

    body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }

    .header {
        background-color: rgb(240, 35, 35);
        color: white;
        padding: 20px;
        text-align: center;
    }

    .header img {
        max-width: 100px;
        vertical-align: middle;
    }

    .header h1 {
        display: inline-block;
        margin: 0 20px;
        vertical-align: middle;
    }

    .nav {
        background-color: #444;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .nav a {
        color: white;
        text-decoration: none;
        padding: 10px 20px;
    }

    .nav a:hover {
        background-color: #555;
    }

    .content {
        padding: 20px;
    }

    .content img {
        max-width: 100%;
    }
</style>

<body>
    <div class="header">
        <img src="../logo/MU.png" alt="Manchester United Logo">
        <h1>Manchester United</h1>

        <p>
            <img src="../img-home/icon-stadium.png" alt=" Sân vận động" width="20">
            Old Trafford
        </p>
        <p>
            <img src="../img-home/icon-website.png" alt="Trang web" width="20">
            Official Website: <a href="https://www.manutd.com">www.mancity.com</a>
        </p>
        <p>
            <a><img src="../img-home/share.png" Chia sẻ" width="20m"></a>
            <a href="https://www.facebook.com/manchesterunited"><img src="../img-home/face.png" alt="Facebook" width="20"></a>
            <a href="https://x.com/ManUtd_AR"><img src="../img-home/X.png" alt="X (Twitter)" width="20"></a>
            <a href="https://www.youtube.com/channel/UC6yW44UGJJBvYTlfC7CRg2Q"><img src="../img-home/Youtube.png" alt="YouTube" width="20"></a>
            <a href="https://www.instagram.com/manchesterunited/"><img src="../img-home/ins.png" alt="Instagram" width="20"></a>
        </p>
    </div>

    <nav class="navbar navbar-expand-lg" style="background-color:rgb(0, 0, 0);">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="../logo/MU.png" style="width: 70px;" alt="Logo">
            </a>

            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link text-white active" href="#"><b>TTCN</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>CẦU THỦ</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>CLB</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>SÂN VẬN ĐỘNG</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>HLV</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TIN TỨC</b></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b style="color: white;">MORE</b>
                        </a>
                        <ul class="dropdown-menu" style="background-color:rgb(233, 22, 22);">
                            <li><a class="dropdown-item" href="#"> <b style="color: white;">MORE</b></a></li>
                            <li><a class="dropdown-item" href="#"> <b style="color: white;">MORE</b></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <b style="color: white;">MORE</b></a></li>
                        </ul>
                    </li>
                    </li>
                </ul>

                <div class="d-flex align-items-center ms-5" style="align-items: center; padding-left: 100px;">
                    <a class="nav-link text-white me-3 d-flex align-items-center" href="Search.php">
                        <b>Search</b>
                        <i class="bi bi-search fs-4"></i>
                    </a>
                    <a class="nav-link text-white me-3 d-flex align-items-center ps-5  ms-auto me-auto" href="#">
                        <b>Sinup</b>
                        <i class="bi bi-person fs-4"></i>
                    </a>
                </div>

            </div>

            <!-- Search & Login Icons -->

        </div>


    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="content">
        <center><img src="../stadiumFC/MU.png" alt="Old Trafford"></center>
        <center>
            <h1>Chào mừng đến với Nhà Hát Của Những Giấc Mơ</h1>
        </center>
        <?php
        $ngay_hom_nay = date("d/m/Y");
        echo "<p>Hôm nay là ngày: " . $ngay_hom_nay . "</p>";
        ?>
    </div>
</body>

</html>