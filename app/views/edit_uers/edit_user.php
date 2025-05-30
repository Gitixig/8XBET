<?php include __DIR__ . '/../layout/header.php'; ?>

<style>
    .edit-user-card {
        border-radius: 30px;
        max-width: 500px;
        width: 100%;
    }
</style>

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 edit-user-card">
        <h3 class="text-center mb-4">Chỉnh sửa người dùng</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="fullname" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname"
                    value="<?= htmlspecialchars($user['fullname']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">💾 Lưu</button>
                <a href="/du_an/8XBET/index.php?controller=user&action=listUsers" class="btn btn-secondary">❌ Hủy</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
