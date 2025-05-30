<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\edit_coach\edit_coach.php -->
<?php
ob_start(); // Bật bộ đệm đầu ra
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

// Lấy thông tin huấn luyện viên cần sửa
$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID huấn luyện viên không hợp lệ.');
}

// Kết nối DB
$conn = mysqli_connect('localhost', 'root', '', '8xbet');
if (!$conn) {
    die('Kết nối thất bại: ' . mysqli_connect_error());
}

// Lấy dữ liệu huấn luyện viên
$query = "SELECT * FROM coaches WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$coach = mysqli_fetch_assoc($result);

if (!$coach) {
    die('Không tìm thấy huấn luyện viên.');
}

// Xử lý cập nhật nếu submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $country = $_POST['country'] ?? '';
    $formation = $_POST['formation'] ?? '';
    $play_style = $_POST['play_style'] ?? '';
    $price = $_POST['price'] ?? '';

    // Xử lý ảnh mới (nếu có upload ảnh)
    $photo = $coach['photo']; // Mặc định giữ ảnh cũ
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $uploadDir = '/du_an/8XBET/public/uploads/';
        $avatarPath = $uploadDir . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $avatarPath)) {
            $avatar = $avatarPath; // Cập nhật đường dẫn ảnh mới
        } else {
            echo "Lỗi khi tải lên ảnh.";
            exit();
        }
    }

    // Update DB
    $updateQuery = "UPDATE coaches SET name=?, dob=?, country=?, formation=?, play_style=?, price=?, photo=? WHERE id=?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, 'sssssdsi', $name, $dob, $country, $formation, $play_style, $price, $photo, $id);
    if (mysqli_stmt_execute($updateStmt)) {
        header("Location: /du_an/8XBET/index.php?controller=coach&action=coach_admin");
        exit();
    } else {
        echo "Cập nhật thất bại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa huấn luyện viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(195, 193, 193);
        }


        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .avatar-preview {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .avatar-preview img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2>Chỉnh Sửa Huấn Luyện Viên</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="avatar-preview">
                    <?php if (!empty($coach['photo'])): ?>
                        <img src="<?= htmlspecialchars($coach['photo']) ?>" alt="Avatar">
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên huấn luyện viên</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($coach['name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Ngày sinh</label>
                    <input type="date" name="dob" id="dob" class="form-control" value="<?= htmlspecialchars($coach['dob']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Quốc gia</label>
                    <input type="text" name="country" id="country" class="form-control" value="<?= htmlspecialchars($coach['country']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="formation" class="form-label">Chiến thuật</label>
                    <input type="text" name="formation" id="formation" class="form-control" value="<?= htmlspecialchars($coach['formation']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="play_style" class="form-label">Phong cách chơi</label>
                    <input type="text" name="play_style" id="play_style" class="form-control" value="<?= htmlspecialchars($coach['play_style']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($coach['price']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
                    <a href="/du_an/8XBET/index.php?controller=coach&action=index" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php ob_end_flush(); // Gửi nội dung bộ đệm và tắt bộ đệm 
?>