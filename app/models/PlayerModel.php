<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\models\PlayerModel.php -->
<?php

require_once __DIR__ . '/../../config/config.php';

class PlayerModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect(); // Kết nối cơ sở dữ liệu
    }

    /**
     * Lấy tất cả cầu thủ
     * @return array
     */
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM players ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPlayerById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM players WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy cầu thủ theo ID
     * @param int $id
     * @return array|null
     */
    public function getPlayerById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM players WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Tạo cầu thủ mới
     * @param string $name
     * @param string $dob
     * @param string $country
     * @param float $height
     * @param float $price
     * @param string $position
     * @param string $photo
     * @return void
     */
    public function create($name, $dob, $country, $height, $price, $position, $photo)
    {
        $dbConfig = include __DIR__ . '/../../config/config.php';
        $pdo = new PDO(
            "mysql:host={$dbConfig['db']['host']};dbname={$dbConfig['db']['name']}",
            $dbConfig['db']['username'],
            $dbConfig['db']['password']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO players (name, dob, country, height, price, position, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $dob, $country, $height, $price, $position, $avatar]);
    }
}
