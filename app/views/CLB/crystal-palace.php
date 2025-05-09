<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crystal Palace</title>
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
        background-color: dodgerblue;
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
                    <li class="nav-item"><a class="nav-link text-white active" href="#"><b>TTCN</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>CẦU THỦ</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="../main-menu/CLB.php"><b>CLB</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>SÂN VẬN ĐỘNG</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>HLV</b></a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#"><b>TIN TỨC</b></a></li>
                    
            </div>
            <a class="nav-link text-white me-3 d-flex align-items-center" href="../main-menu/Search.php">
                <b>Search</b>
                <i class="bi bi-search fs-4"></i>
            </a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="header">
        <img src="../../../public/img/logo-CLB/CrystalPalace.png" alt="Crystal Palace Logo">
        <h1>Crystal Palace</h1>

        <p>
            <img src="../../../public/img/img-logo/icon-stadium.png" alt=" Sân vận động" width="20">
            Selhurst Park
        </p>
        <p>
            <img src="../../../public/img/img-logo/icon-website.png" alt="Trang web" width="20">
            Official Website: <a href="https://www.cpfc.co.uk">www.cpfc.co.uk</a>
        </p>
        <p>
            <a><img src="../../../public/img/img-logo/share.png" Chia sẻ" width="20m"></a>
            <a href="https://www.facebook.com/officialcpfc"><img src="../../../public/img/img-logo/face.png" alt="Facebook" width="20"></a>
            <a href="https://x.com/CPFC"><img src="../../../public/img/img-logo/X.png" alt="X (Twitter)" width="20"></a>
            <a href="https://www.youtube.com/channel/UCWB9N0012fG6bGyj486Qxmg"><img src="../../../public/img/img-logo/Youtube.png" alt="YouTube" width="20"></a>
            <a href="https://www.instagram.com/cpfc"><img src="../../../public/img/img-logo/ins.png" alt="Instagram" width="20"></a>
        </p>
    </div>
    <div class="content">
        <center><img src="../../../public/img/img-stadium/CrystalPalace.png" alt="Selhurst Park"></center>
        <center>
            <h1>Chào mừng đến với Sân Vận Động Selhurst Park </h1>
        </center>
        <?php
        $ngay_hom_nay = date("d/m/Y");
        echo "<p>Hôm nay là ngày: " . $ngay_hom_nay . "</p>";
        ?>
    </div>
</body>

</html>