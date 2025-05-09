<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Danh sách người dùng</h2>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên đăng nhập</th>
                <th>Họ và tên</th>
                <th>Mật Khẩu </th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                        <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        <td>
                            <a href="<?php echo $base_url ?>/index.php?controller=user&action=deleteUser&id=<?php echo $user['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                Xóa
                            </a>
                            <a href="<?php echo $base_url ?>/index.php?controller=user&action=editUser&id=<?php echo $user['id']; ?>"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Chỉnh sửa
                            </a>

                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Không có người dùng nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>