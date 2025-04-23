<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Chỉnh sửa người dùng</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="fullname">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="/du_an/8XBET/index.php?controller=user&action=listUsers" class="btn btn-secondary">Hủy</a>
    </form>
</div>

