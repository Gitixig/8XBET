<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\controllers\playercontroller.php -->
<?php

require_once __DIR__ . '/../models/PlayerModel.php';

class PlayerController
{
    /**
     * Hiển thị form thêm cầu thủ
     */
    public function add()
    {
        include __DIR__ . '/../views/played/add_playes/add_playes.php';
    }

    /**
     * Lưu cầu thủ mới vào cơ sở dữ liệu
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $country = $_POST['country'];
            $height = $_POST['height'];
            $price = $_POST['price'];
            $position = $_POST['position'];

            // Xử lý ảnh đại diện
            $photo = $_FILES['avatar'];
            $photoPath = '/du_an/8XBET/public/uploads/' . basename($photo['name']);
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            move_uploaded_file($photo['tmp_name'], $uploadDir . basename($photo['name']));

            // Tạo cầu thủ mới
            $playerModel = new PlayerModel();
            $playerModel->create($name, $dob, $country, $height, $price, $position, $photoPath);

            header("Location: /du_an/8XBET/index.php?controller=player&action=list_player_admin");
            exit;
        }
    }

    /**
     * Hiển thị danh sách cầu thủ
     */
    public function list_player()
    {
        $playerModel = new PlayerModel();
        $players = $playerModel->getAll();
        include __DIR__ . '/../views/list_player/list_player.php';
    }

    public function list_player_admin()
    {
        $playerModel = new PlayerModel();
        $players = $playerModel->getAll();
        include __DIR__ . '/../views/list_player/list_player_admin.php';
    }

    /**
     * Hiển thị form chỉnh sửa cầu thủ
     */
    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $playerModel = new PlayerModel();
            $player = $playerModel->getPlayerById($id);

            if (!$player) {
                die('Không tìm thấy cầu thủ.');
            }

            include __DIR__ . '/../views/edit_player/edit_player.php';
        }
    }

    /**
     * Cập nhật thông tin cầu thủ
     */
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $country = $_POST['country'];
            $height = $_POST['height'];
            $price = $_POST['price'];
            $position = $_POST['position'];

            // Xử lý ảnh đại diện
            $photo = $_FILES['avatar'];
            if ($photo['error'] == 0) {
                $photoPath = '/du_an/8XBET/public/uploads/' . basename($photo['name']);
                move_uploaded_file($photo['tmp_name'], __DIR__ . '/../../public/uploads/' . basename($photo['name']));
            } else {
                $playerModel = new PlayerModel();
                $player = $playerModel->getPlayerById($id);
                $photoPath = $player['photo'];
            }

            // Cập nhật cầu thủ
            $playerModel = new PlayerModel();
            $playerModel->update($id, $name, $dob, $country, $height, $price, $position, $photoPath);

            header("Location: /du_an/8XBET/index.php?controller=player&action=list_player_admin");
            exit();
        }
    }

    /**
     * Xóa cầu thủ
     */
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $playerModel = new PlayerModel();
            $playerModel->delete($id);
            header("Location: /du_an/8XBET/index.php?controller=player&action=list_player_admin");
            exit();
        }
    }
}
