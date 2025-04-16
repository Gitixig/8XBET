<?php

require_once __DIR__ . '/../models/PlayerModel.php';

class PlayerController
{
    // Hiển thị form thêm cầu thủ
    public function add()
    {
        include __DIR__ . '/../views/played/add_playes/add_playes.php';
    }

    // Xử lý lưu cầu thủ vào cơ sở dữ liệu
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $country = $_POST['country'];
            $height = $_POST['height'];
            $price = $_POST['price'];
            $position = $_POST['position'];

            // Xử lý upload ảnh
            $photo = $_FILES['avatar'];
            $photoPath = '/du_an/8XBET/public/uploads/' . basename($photo['name']);
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            move_uploaded_file($photo['tmp_name'], $uploadDir . basename($photo['name']));

            // Lưu dữ liệu vào database
            PlayerModel::create($name, $dob, $country, $height, $price, $position, $photoPath);

            // Chuyển hướng về danh sách cầu thủ (hoặc trang khác)
            header("Location: /du_an/8XBET/index.php?controller=player&action=index");
            exit;
        }
    }
}