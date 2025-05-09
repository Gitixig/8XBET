<?php include __DIR__ . '/../main-menu/Menu.php';


$conn = mysqli_connect('localhost', 'root', '', '8xbet');

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


$productlist = mysqli_query($conn, 'SELECT * FROM players');
$topPlayer = mysqli_query($conn, 'SELECT * FROM players ORDER BY price DESC LIMIT 3');
$stadium = mysqli_query($conn, 'SELECT * FROM stadiums');
$topStadium = mysqli_query($conn, 'SELECT * FROM stadiums ORDER BY price DESC LIMIT 3');
$coach = mysqli_query($conn, 'SELECT * FROM coaches');
$topCoach = mysqli_query($conn, 'SELECT * FROM coaches ORDER BY price DESC LIMIT 3');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product-box {
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            padding: 15px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .product-box:hover {
            transform: scale(1.05);
        }

        .product-box img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            transition: opacity 0.3s ease-in-out;
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
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .button:hover {
            background: orangered;
        }
    </style>
</head>
<body>
    

<h2>Chào mừng đến với 8XBET</h2>
<p>Trang bán sân vận động, cầu thủ và câu lạc bộ bóng đá và HLV</p>

<h3>Top sân vận động nổi bật</h3>

<div class="container justify-content-center" style="padding-top: 30px; padding-bottom: 30px;">

<div class="row row-custom">
<div class="container justify-content-center" style="padding-top: 30px; padding-bottom: 30px;">

<div class="row row-custom">
    <?php foreach ($topStadium as $item) { ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="product-box" style="margin: 20px;">
                <img src="<?= htmlspecialchars($item['image']) ?>" alt="Ảnh Sân Vận Động">
                <div class="product-info">
                    <h4><?= htmlspecialchars($item['name']) ?></h4>
                    <p>Sức chứa: <?= htmlspecialchars($item['capacity']) ?></p>
                    <p>Quốc gia:
                        <img id="country-flag" src="/du_an/8XBET/app/views/layout/flags/<?= strtolower(str_replace(' ', '-', htmlspecialchars($item['country']))) ?>.png"
                            style="height: 35px; width: 45px; margin-left: 20px;">
                        <?= htmlspecialchars($item['country']) ?>
                    </p>
                    <p>Giá : <?= number_format($item['price'], 0) ?> VNĐ</p>
                </div>
                <div class="product-action">
                    <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=add">
                        <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']) ?>">
                        <input type="hidden" name="item_type" value="stadium">
                        <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                        <button type="submit" class="button">Add to Cart</button>
                    </form>

                    <button class="button">Buy</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>
        


<h3>Cầu thủ nổi bật</h3>
<div class="container justify-content-center" style="padding-top: 30px; padding-bottom: 30px;">

        <div class="row row-custom">
            <?php foreach ($topPlayer as $item) { ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-box" style="margin: 20px;">
                        <img src="<?= htmlspecialchars($item['photo']) ?>" alt="Ảnh cầu thủ">
                        <div class="product-info">
                            <h4><?= htmlspecialchars($item['name']) ?></h4>
                            <p>Ngày sinh: <?= htmlspecialchars($item['dob']) ?></p>
                            <p>Chiều cao: <?= htmlspecialchars($item['height']) ?> cm</p>
                            <p>Quốc gia:
                                <img id="country-flag" src="/du_an/8XBET/app/views/layout/flags/<?= strtolower(str_replace(' ', '-', htmlspecialchars($item['country']))) ?>.png"
                                    style="height: 35px; width: 45px; margin-left: 20px;">
                                <?= htmlspecialchars($item['country']) ?>
                            </p>
                            <p>Giá : <?= number_format($item['price'], 0) ?> VNĐ</p>
                        </div>
                        <div class="product-action">
                            <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=add">
                                <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']) ?>">
                                <input type="hidden" name="item_type" value="player">
                                <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                                <button type="submit" class="button">Add to Cart</button>
                            </form>

                            <button class="button">Buy</button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <h3>HLV Nổi Bật</h3>
    <div class="container justify-content-center" style="padding-top: 30px; padding-bottom: 30px;">

<div class="row row-custom">
    <?php foreach ($topCoach as $item) { ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="product-box" style="margin: 20px;">
                <img src="<?= $item['avatar'] ?>" alt="Ảnh HLV">
                <div class="product-info">
                    <h4><?= $item['name'] ?></h4>
                    <p>Ngày sinh: <?= $item['dob'] ?></p>
                    <p>Quốc gia:
                        <img id="country-flag" src="/du_an/8XBET/app/views/layout/flags/<?= strtolower(str_replace(' ', '-', $item['country'])) ?>.png"
                            style="height: 35px; width: 45px; margin-left: 20px;">
                        <?= $item['country'] ?>
                    </p>
                    <p>Sơ đồ: <?= $item['formation'] ?></p>
                    <p>Phong cách chơi: <?= $item['play_style'] ?></p>
                    <p>Giá : <?= $item['price'] ?></p>
                </div>
                <div class="product-action">
                    <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=add">
                        <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']) ?>">
                        <input type="hidden" name="item_type" value="coach">
                        <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                        <button type="submit" class="button">Add to Cart</button>
                    </form>

                    <button class="button">Buy</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>


</body>
</html>