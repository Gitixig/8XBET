<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Danh sách người dùng</h2>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ và tên</th>
                    <th>Mật khẩu</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
                            <td><?= htmlspecialchars($user['fullname']) ?></td>
                            <td>••••••••</td> <!-- Ẩn mật khẩu vì lý do bảo mật -->
                            <td><?= htmlspecialchars($user['created_at']) ?></td>
                            <td>
                                <a href="<?= $base_url ?>/index.php?controller=user&action=editUser&id=<?= $user['id'] ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="<?= $base_url ?>/index.php?controller=user&action=deleteUser&id=<?= $user['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Không có người dùng nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>