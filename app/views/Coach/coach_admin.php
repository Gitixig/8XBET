<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\Coach\coach_admin.php -->
<?php include __DIR__ . '/../layout/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Cầu Thủ</title>
    <style>
        .product-box {
            text-align: center;
            border-radius: 30px;
            box-shadow: 4px 10px rgba(0, 0, 0, 0.1);
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
            text-decoration: none;
            /* Xóa gạch chân */
        }

        .button:hover {
            background: orangered;
        }
    </style>
</head>
<?php
$conn = mysqli_connect('localhost', 'root', '', '8xbet');


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


$productlist = mysqli_query($conn, 'SELECT * FROM coaches');
?>

<body>
    <h2 style="text-align: center;">Danh Sách HLV</h2>
    <div class="container justify-content-center" style="padding-top: 30px; padding-bottom: 30px;">

        <div class="row row-custom">
            <?php while ($item = mysqli_fetch_assoc($productlist)) { ?>
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
                            <a href="/du_an/8XBET/index.php?controller=coach&action=edit_coach&id=<?= $item['id'] ?>"
                                class="button">Sửa</a>
                            <a href="/du_an/8XBET/index.php?controller=coach&action=delete_coach&id=<?= $item['id'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa HLV này?')" class="button">Xóa</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>