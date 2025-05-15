<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>8XBET</title>
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
    {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .product-box {
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .product-box:hover {
            transform: scale(1.05);
        }

        .product-box img {
            transition: opacity 0.3s ease-in-out;
        }
        .product-box center { 
            display: flex;
            justify-content: center;
  
        }
        

        .product-box:hover img {
            opacity: 0.3;
        }

        .product-info {
            transition: opacity 0.3s ease-in-out;
        }

        .product-box:hover .product-info {
            opacity: 0.3;
        }

        .product-action {
            position: absolute;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s ease-in-out;
            opacity: 0;
            text-align: center;
            top: 50%;
            left: 50%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
            gap: 10px;
        }

        .product-box:hover .product-action {
            opacity: 1;
        }

        .button {
            background: orange;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;

        }

        .button:hover {
            background: orangered;
        }
        
</style>


<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container">
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:red;">
                <img src="../../../public/img/logo-CLB/MU.png" style="width: 150px;">
                    <div class="product-info">
                        <div class="product-title">Manchester United</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/manchester-united.php">Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:deepskyblue;">
                    <img src="../../../public/img/logo-CLB/MC.png" style="width: 150px;">
                    <div class="product-info">
                        <div class="product-title">Manchester City</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/manchester-city.php">Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:rgb(7, 0, 201);">
                    <img src="../../../public/img/logo-CLB/Chelsea.png" style="width: 150px;">
                    <div class="product-info">
                        <div class="product-title">Chelsea</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/Chelsea.php">Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:darkgray;">
                    <img src="../../../public/img/logo-CLB/New.png" style="width: 150px;">
                    <div class="product-info">
                        <d class="product-title">Newcastle United</d>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/Newcasble.php">Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:brown  ;">
                  <center>  <img src="../../../public/img/logo-CLB/AstonVilla.png" style="width:315px;"> </center>     
                    <div class="product-info">
                        <div class="product-title">Aston Villa</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/aston-villa.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:darkred;">
                    <img src="../../../public/img/logo-CLB/Bournemouth.png" style="width: 178px;">
                    <div class="product-info">
                        <div class="product-title">Bournemouth</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/bournemouth.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:indianred;">
                    <img src="../../../public/img/logo-CLB/Brentford.png" style="width: 178px;">
                    <div class="product-info">
                        <div class="product-title">Brentford</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/brentford.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:cornflowerblue;">
                    <img src="../../../public/img/logo-CLB/Brighton.png" style="width: 178px;">
                    <div class="product-info">
                        <div class="product-title">Brighton & Hove Albion</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/brighton.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:dodgerblue">
                    <img src="../../../public/img/logo-CLB/CrystalPalace.png" style="width: 178px;">
                    <div class="product-info">
                        <div class="product-title">Crystal Palace</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/crystal-palace.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:rgb(11, 6, 148)">
                    <img src="../../../public/img/logo-CLB/Everton.png" style="width: 175px;">
                    <div class="product-info">
                        <div class="product-title">Everton</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/everton.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:rgb(239, 239, 239)">
                    <img src="../../../public/img/logo-CLB/Fulham.png" style="width: 133px;">
                    <div class="product-info">
                        <div class="product-title">Fulham</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/fulham.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-box" style="background-color:lightpink">
                    <img src="../../../public/img/logo-CLB/Liverpool.png" style="width: 130px;">
                    <div class="product-info">
                        <div class="product-title">Liverpool</div>
                    </div>
                    <div class="product-action">
                        <a class="button" href="../CLB/liverpool.php">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include '../layout/footer.php'; ?>
</html>