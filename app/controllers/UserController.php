<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $fullname = $_POST['fullname'] ?? null;
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            
            if (empty ($fullname)|| empty($username) || empty($password)) {
                echo "Vui lòng nhập đầy đủ thông tin!";
                return;
            }

            
            $userModel = new User();
            $result = $userModel->addUser($fullname, $username, $password);

            if ($result) {
                echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.');</script>";
                echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=auth&action=login';</script>";
                exit;
            } else {
                echo "Đăng ký thất bại! Tên đăng nhập đã tồn tại.";
            }
        } else {
            include __DIR__ . '/../views/add_User/add_User.php';
        }
    }
}
