<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    // Thêm người dùng
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? null;
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            if (empty($fullname) || empty($username) || empty($password)) {
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
            exit();
        }
    }

    // Hiển thị thông tin người dùng
    public function userDashboard()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $userModel = new User();
        $userInfo = $userModel->getUserInfo($_SESSION['user']);

        if (!$userInfo) {
            die("Không tìm thấy thông tin người dùng.");
        }

        include __DIR__ . '/../views/login/user_dashboard.php';
    }




    public function listUsers()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $userModel = new User();
        $users = $userModel->getAllUsers();

        include __DIR__ . '/../views/list_user/list_user.php';
    }
    public function deleteUser()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        if (!isset($_GET['id'])) {
            die("ID người dùng không hợp lệ.");
        }

        $id = intval($_GET['id']);
        $userModel = new User();
        $result = $userModel->deleteUserById($id);

        if ($result) {
            echo "<script>alert('Xóa người dùng thành công!');</script>";
        } else {
            echo "<script>alert('Xóa người dùng thất bại!');</script>";
        }
        echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=user&action=listUsers';</script>";
        exit;
    }


    public function editUser()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) die("ID người dùng không hợp lệ.");

        $userModel = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $username = $_POST['username'] ?? '';
            if ($userModel->updateUser($id, $fullname, $username)) {
                echo "<script>alert('Cập nhật thành công!');</script>";
            } else {
                echo "<script>alert('Cập nhật thất bại!');</script>";
            }
            echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=user&action=listUsers';</script>";
            exit;
        }

        $user = $userModel->getUserById($id);
        include __DIR__ . '/../views/edit_uers/edit_user.php';
    }
}
