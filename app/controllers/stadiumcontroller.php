<?php

require_once __DIR__ . '/../models/stadium.php';

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
}