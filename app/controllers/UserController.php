<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            // Kiểm tra dữ liệu đầu vào
            if (empty($username) || empty($password)) {
                echo "Vui lòng nhập đầy đủ thông tin!";
                return;
            }

            // Khởi tạo model và thêm người dùng
            $userModel = new User();
            $result = $userModel->addUser($username, $password);

            if ($result) {
                // Hiển thị thông báo và chuyển hướng về trang đăng nhập
                echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.');</script>";
                echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=auth&action=login';</script>";
                exit;
            } else {
                echo "Đăng ký thất bại! Tên đăng nhập đã tồn tại.";
            }
        } else {
            // Hiển thị form đăng ký
            echo "<script>alert('Sai tên tài khoản hoặc mật khẩu.');</script>";
            echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=auth&action=login';</script>";
            include __DIR__ . '/../views/add_User/add_User.php';
            exit();
        }
    }
}
