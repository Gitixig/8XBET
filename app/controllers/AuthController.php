<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['user'] ?? null;
$role = $_SESSION['role'] ?? null;

require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/AdminModel.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars($_POST['username']); // Làm sạch dữ liệu đầu vào
            $password = htmlspecialchars($_POST['password']); // Làm sạch dữ liệu đầu vào

            // Kiểm tra đăng nhập admin
            $admin = Admin::authenticate($username, $password);
            if ($admin) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $admin['id']; // Thêm user_id
                $_SESSION['user'] = $admin['username'];
                $_SESSION['role'] = 'admin';
                header("Location: /du_an/8XBET/index.php?controller=auth&action=adminDashboard");
                exit;
            }

            // Kiểm tra đăng nhập user
            $user = User::authenticate($username, $password);
            if ($user) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user['id']; // Thêm user_id
                $_SESSION['user'] = $user['username'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = 'user';
                header("Location: /du_an/8XBET/index.php?controller=Home&action=home");
                exit;
            }

            // Nếu đăng nhập thất bại
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

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
        exit;
    }
}