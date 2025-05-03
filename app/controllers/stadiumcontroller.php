<?php

require_once __DIR__ . '/../models/StadiumModel.php';

class StadiumController
{
    public function add()
    {
        include __DIR__ . '/../views/add_stadium/add_stadium.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $capacity = $_POST['capacity'];
            $country = $_POST['country'];
            $price = $_POST['price'];
            $photo = $_FILES['avatar'];
            $photoPath = '/du_an/8XBET/public/uploads/' . basename($photo['name']);
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            move_uploaded_file($photo['tmp_name'], $uploadDir . basename($photo['name']));

            StadiumModel::create($name, $capacity, $country, $price,$photoPath);

            header("Location: /du_an/8XBET/index.php?controller=stadium&action=stadium");
            exit;
        }
    }
        public function stadium(){
        $stadiumModell=new StadiumModel();
        $stadium= $stadiumModell->getAll();
        include __DIR__ . '/../views/Stadiums/Stadium.php';
    }

    public function stadium_admin()
    {
        $stadiumModell = new StadiumModel();
        $stadium = $stadiumModell->getAll();
        include __DIR__ . '/../views/Stadiums/Stadium_admin.php';
    }
    public function edit_stadium()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) die("ID sân vận động không hợp lệ.");

        $stadiumModel = new StadiumModel();
        $stadium = $stadiumModel->getStadiumById($id);

        if (!$stadium) {
            die("Không tìm thấy sân vận động.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $capacity = $_POST['capacity'] ?? '';
            $country = $_POST['country'] ?? '';
            $price = $_POST['price'] ?? '';
            $image = $stadium['image']; 

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imagePath = '/du_an/8XBET/public/uploads/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $imagePath);
                $image = $imagePath;
            }

            if ($stadiumModel->updateStadium($id, $name, $capacity, $country, $price, $image)) {
                echo "<script>window.location.href = '/du_an/8XBET/index.php?controller=stadium&action=stadium_admin';</script>";
                exit;
            } else {
                echo "<script>alert('Cập nhật thất bại!');</script>";
            }
        }

        include __DIR__ . '/../views/edit_stadium/edit_stadium.php';
    }


    function delete_stadium()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) die("ID người dùng không hợp lệ.");

        $stadiumModel = new StadiumModel();
        $stadiumModel->deleteStadium($id);
        header("Location: /du_an/8XBET/index.php?controller=stadium&action=stadium_admin");
        exit;
    }
}