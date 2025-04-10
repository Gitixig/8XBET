<?php
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/AdminModel.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra trong bảng admins
            $admin = Admin::authenticate($username, $password);
            if ($admin) {
                session_start();
                $_SESSION['user'] = $admin['username'];
                $_SESSION['role'] = 'admin';
                header("Location: /du_an/8XBET/index.php?controller=auth&action=adminDashboard");
                exit;
            }

            // Kiểm tra trong bảng users
            $user = User::authenticate($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = 'user';
                header("Location: /du_an/8XBET/index.php?controller=auth&action=userDashboard");
                exit;
            }

            // Sai tài khoản hoặc mật khẩu
            $error = "Sai tài khoản hoặc mật khẩu!";
            include 'app/views/login/login.php';
        } else {
            include 'app/views/login/login.php';
        }
    }

    public function adminDashboard()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo "Bạn không có quyền truy cập!";
            exit;
        }
        include 'app/views/login/admin_dashboard.php';
    }

    public function userDashboard()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
            echo "Bạn không có quyền truy cập!";
            exit;
        }
        include 'app/views/login/user_dashboard.php';
    }
}
?>