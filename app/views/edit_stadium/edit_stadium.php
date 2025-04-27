<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include __DIR__ . '/../layout/header.php'; ?>

<?php
// Kiểm tra quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
    exit();
}

// Lấy thông tin sân vận động cần sửa
$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID sân vận động không hợp lệ.');
}

// Kết nối DB
$conn = mysqli_connect('localhost', 'root', '', '8xbet');
if (!$conn) {
    die('Kết nối thất bại: ' . mysqli_connect_error());
}

// Lấy dữ liệu sân vận động
$query = "SELECT * FROM stadiums WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$stadium = mysqli_fetch_assoc($result);

if (!$stadium) {
    die('Không tìm thấy sân vận động.');
}

// Xử lý cập nhật nếu submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $capacity = $_POST['capacity'] ?? '';
    $country = $_POST['country'] ?? '';
    $price = $_POST['price'] ?? '';

    // Xử lý ảnh mới (nếu có upload ảnh)
    $image = $stadium['image']; // Mặc định giữ ảnh cũ
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imagePath = '/du_an/8XBET/public/uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $imagePath);
        $image = $imagePath;
    }

    // Update DB
    $updateQuery = "UPDATE stadiums SET name=?, capacity=?, country=?, price=?, image=? WHERE id=?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, 'sisdsi', $name, $capacity, $country, $price, $image, $id);
    if (mysqli_stmt_execute($updateStmt)) {
        header("Location: /du_an/8XBET/index.php?controller=stadium&action=index");
        exit();
    } else {
        echo "Cập nhật thất bại.";
    }
}
?>

<style>
    .container-custom {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
        font-size: 16px;
    }

    .avatar-preview {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .avatar-preview img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid #ccc;
    }

    input[type="file"] {
        display: none;
    }
</style>

<body>
    <div class="container container-custom" style="margin-top: 30px; margin-bottom: 30px;">
        <h2 style="text-align: center;">Chỉnh Sửa Sân Vận Động</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="avatar-preview">
                <label for="avatar-upload">
                    <img id="avatar-preview" src="<?= htmlspecialchars($stadium['image']) ?>" alt="Ảnh sân vận động">
                </label>
                <input type="file" name="image" id="avatar-upload" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Tên sân vận động</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($stadium['name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="capacity">Sức chứa</label>
                <input type="number" id="capacity" name="capacity" value="<?= htmlspecialchars($stadium['capacity']) ?>" required>
            </div>

            <div class="form-group">
                <label for="country">Quốc Gia</label>
                <img id="country-flag" src="/du_an/8XBET/app/views/layout/flags/<?= strtolower(str_replace(' ', '-', $stadium['country'])) ?>.png" style="height: 35px; width: 45px;">
                <?php include(__DIR__ . '/../layout/national/national.php'); ?>
            </div>

            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="text" id="price" name="price" value="<?= htmlspecialchars($stadium['price']) ?>" required>
            </div>

            <button type="submit">Lưu Thông Tin</button>
        </form>
    </div>

    <script>
        document.getElementById('avatar-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('avatar-preview').src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('country').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var flagUrl = selectedOption.getAttribute('data-flag');
            var flagImg = document.getElementById('country-flag');
            if (flagUrl) {
                flagImg.src = flagUrl;
                flagImg.style.display = "inline";
            } else {
                flagImg.style.display = "none";
            }
        });
    </script>
</body>
