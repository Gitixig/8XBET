<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\edit_player\edit_player.php -->
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

// Kiểm tra nếu không có dữ liệu cầu thủ
if (!$player) {
    die('Không tìm thấy cầu thủ.');
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Cầu Thủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color:rgb(195, 193, 193); 
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
            border-radius: 10px;
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
            <h2>Chỉnh Sửa Cầu Thủ</h2>
            <form action="/du_an/8XBET/index.php?controller=player&action=update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($player['id']) ?>">

                <div class="avatar-preview">
                    <?php if (!empty($player['photo'])): ?>
                        <img src="<?= htmlspecialchars($player['photo']) ?>" alt="Ảnh cầu thủ">
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Tên cầu thủ</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($player['name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Ngày sinh</label>
                    <input type="date" name="dob" id="dob" class="form-control" value="<?= htmlspecialchars($player['dob']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Quốc gia</label>
                    <input type="text" name="country" id="country" class="form-control" value="<?= htmlspecialchars($player['country']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">Chiều cao (cm)</label>
                    <input type="number" name="height" id="height" class="form-control" value="<?= htmlspecialchars($player['height']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá (VNĐ)</label>
                    <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($player['price']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Vị trí</label>
                    <input type="text" name="position" id="position" class="form-control" value="<?= htmlspecialchars($player['position']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Lưu Thông Tin</button>
                    <a href="/du_an/8XBET/index.php?controller=player&action=list_player_admin" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>