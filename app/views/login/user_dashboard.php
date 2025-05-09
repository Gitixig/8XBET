<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
    exit;
}
include __DIR__ . '/../main-menu/Menu.php';
// Kết nối cơ sở dữ liệu
require_once __DIR__ . '/../../../config/database.php';
$db = Database::connect();

// Lấy thông tin người dùng từ bảng `users`
$stmt = $db->prepare("SELECT fullname, username, created_at FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userInfo) {
    echo "Không tìm thấy thông tin người dùng.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .menueff-button {
        display: inline-block;
        padding: 15px 30px;
        font-size: 16px;
        color: rgb(89, 118, 18);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: rgb(190, 193, 195);
        border-radius: 10px;
        box-shadow: 5px 5px 10px #a3b1c6, -5px -5px 10px #ffffff;
        text-align: center;
        margin-bottom: 20px;
    }

    .menueff-button:active {
        background-color: #d1d9e6;
        border: 1px solid rgb(240, 244, 249);
    }

    .menueff-button:hover {
        background-color: white;
        color: black;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .text-center {
        text-align: center;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
</style>


<body class="bg-light text-dark">
    <div class="container">
        <div class="card text-center mx-auto mt-5 mb-5" style="max-width: 500px;">
            <h2 class="mb-4"><i class="bi bi-person-circle"></i> Thông tin người dùng</h2>
            <p><strong>👤 Họ và tên:</strong> <?= htmlspecialchars($userInfo['fullname']) ?></p>
            <p><strong>🆔 Tên đăng nhập:</strong> <?= htmlspecialchars($userInfo['username']) ?></p>
            <p><strong>📅 Ngày tạo tài khoản:</strong> <?= htmlspecialchars(date('d/m/Y H:i:s', strtotime($userInfo['created_at']))) ?></p>
            <button class="menueff menueff-button">
                <a href="/du_an/8XBET/index.php?controller=Order&action=history" class="nav-link">
                    <p> <strong> 🛒📜 Lịch sử đặt hàng </strong> </p>
                </a>
            </button>
            <div class="text-center mt-4">
                <form action="/du_an/8XBET/index.php?controller=auth&action=logout" method="POST">
                    <button type="submit" class="menueff menueff-button">Đăng xuất</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include __DIR__ . '/../layout/footer.php';
?>

</html>