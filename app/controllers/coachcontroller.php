<?php

require_once __DIR__ . '/../models/coach.php';

class CoachController
{
    public function add()
    {
        include __DIR__ . '/../views/add_coach/add_coach.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $country = $_POST['country'];
            $formation=$_POST['formation'];
            $play_style=$_POST['play_style'];
            $price = $_POST['price'];


            $photo = $_FILES['avatar'];
            $photoPath = '/du_an/8XBET/public/uploads/' . basename($photo['name']);
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            move_uploaded_file($photo['tmp_name'], $uploadDir . basename($photo['name']));

            CoachModel::create($name, $dob, $country, $formation,$play_style,$price,$photoPath);

            header("Location: /du_an/8XBET/index.php?controller=coach&action=coach");
            exit;
        }
    }
        public function coach(){
        $coachModel=new CoachModel();
        $coach= $coachModel->getAll();
        include __DIR__ . '/../views/coach/coach.php';
    }
}