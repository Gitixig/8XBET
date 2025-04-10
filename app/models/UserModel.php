<?php

require_once __DIR__ . '/../../config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function addUser($username, $password)
    {
        // Mã hóa mật khẩu
        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        // Kiểm tra xem username đã tồn tại chưa
        $stmt = $this->db->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return false; // Username đã tồn tại
        }

        // Thêm người dùng mới
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hash_password]);
    }

    public static function authenticate($username, $password)
    {
        // Kết nối cơ sở dữ liệu
        $db = Database::connect();

        // Kiểm tra username trong bảng users
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra mật khẩu
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Trả về thông tin người dùng nếu đăng nhập thành công
        }

        return false; // Trả về false nếu đăng nhập thất bại
    }
}