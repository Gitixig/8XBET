<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Đăng ký tài khoản</h4>
        </div>
        <div class="card-body">
            <form action="/du_an/8XBET/index.php?controller=user&action=addUser" method="post">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>