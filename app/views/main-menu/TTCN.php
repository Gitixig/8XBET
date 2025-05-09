<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thị Trường Chuyển Nhượng Bóng Đá</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .transfer-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .transfer-card {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .player-image {
            width: 100%;
            height: auto;
            border-radius: 5px 5px 0 0;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .player-info h3 {
            margin-top: 0;
            margin-bottom: 5px;
            color: #333;
        }
        .player-info p {
            margin-bottom: 5px;
            color: #666;
        }
        .transfer-status {
            font-weight: bold;
            color: green; /* Màu cho trạng thái đã hoàn tất */
        }
        /* Thêm style cho tin đồn nếu cần */
        .rumor {
            color: orange;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Thị Trường Chuyển Nhượng Bóng Đá</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "8xbet";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn dữ liệu chuyển nhượng (ví dụ: lấy tất cả cầu thủ)
    $sql = "SELECT name, position, club, price, image_path FROM players";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="transfer-list">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="transfer-card">';
            if (!empty($row['image_path'])) {
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" class="player-image">';
            } else {
                echo '<div style="height: 150px; background-color: #eee; display: flex; justify-content: center; align-items: center; border-radius: 5px 5px 0 0;">Không có ảnh</div>';
            }
            echo '<div class="player-info">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>Vị trí: ' . $row['position'] . '</p>';
            echo '<p>Câu lạc bộ: ' . $row['club'] . '</p>';
            echo '<p>Giá: <strong>' . $row['price'] . '</strong></p>';
            echo '<p class="transfer-status">Đang có trên thị trường</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>Không có cầu thủ nào trên thị trường chuyển nhượng.</p>';
    }

    $conn->close();
    ?>

</body>
</html>