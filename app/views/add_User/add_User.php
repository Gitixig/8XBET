<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<style>
     body {
        margin: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-image: url('/du_an/8XBET/public/img/sanbong_login.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 30rem;">
        <h4 class="mb-4 text-center">Đăng ký tài khoản</h4>
        <form action="/du_an/8XBET/index.php?controller=user&action=addUser" method="post">
            <div class="form-group mb-3">
                <label for="fullname">Họ và Tên</label>
                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="form-group mb-3">
                <label for="username">Tên đăng nhập </label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Tạo tài khoản</button>
        </form>
    </div>
</div>
</body>