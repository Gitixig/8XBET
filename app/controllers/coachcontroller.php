<?php

require_once __DIR__ . '/../models/CoachModel.php';

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
    
    public function coach_admin()
    {
        $coachModel = new CoachModel();
        $coach = $coachModel->getAll();
        include __DIR__ . '/../views/coach/coach_admin.php';
    }

    public function edit_coach()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) die("ID HLV không hợp lệ.");

        $coachModel = new CoachModel();
        $coach = $coachModel->getCoachById($id);

        if (!$coach) {
            die("Không tìm thấy HLV với ID: " . htmlspecialchars($id));
        }

        include __DIR__ . '/../views/edit_coach/edit_coach.php';
    }

    public function update_coach()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0) die("ID HLV không hợp lệ.");

        $name = $_POST['name'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $country = $_POST['country'] ?? '';
        $formation = $_POST['formation'] ?? '';
        $play_style = $_POST['play_style'] ?? '';
        $price = $_POST['price'] ?? '';

        // Xử lý ảnh mới (nếu có upload ảnh)
        $photoPath = null;
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
            $photoPath = '/du_an/8XBET/public/uploads/' . basename($_FILES['avatar']['name']);
            move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/../../public/uploads/' . basename($_FILES['avatar']['name']));
        }

        $coachModel = new CoachModel();
        $coachModel->updateCoach($id, $name, $dob, $country, $formation, $play_style, $price, $photoPath);

        header("Location: /du_an/8XBET/index.php?controller=coach&action=coach_admin");
        exit;
    }

    public function delete_coach()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
            exit;
        }

        $id = intval($_GET['id'] ?? 0);
        if ($id <= 0) die("ID HLV không hợp lệ.");

        $coachModel = new CoachModel();
        $coachModel->deleteCoach($id);

        header("Location: /du_an/8XBET/index.php?controller=coach&action=coach_admin");
        exit;
    }
}