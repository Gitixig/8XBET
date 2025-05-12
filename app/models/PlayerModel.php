<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\models\PlayerModel.php -->
<?php

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

    /**
     * Lấy cầu thủ theo ID
     * @param int $id
     * @return array|null
     */
    public function getPlayerById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM players WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
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
        $stmt = $this->db->prepare("INSERT INTO players (name, dob, country, height, price, position, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $dob, $country, $height, $price, $position, $photo]);
    }

    /**
     * Cập nhật thông tin cầu thủ
     * @param int $id
     * @param string $name
     * @param string $dob
     * @param string $country
     * @param float $height
     * @param float $price
     * @param string $position
     * @param string $photo
     * @return void
     */
    public function update($id, $name, $dob, $country, $height, $price, $position, $photo)
    {
        $stmt = $this->db->prepare("UPDATE players SET name = ?, dob = ?, country = ?, height = ?, price = ?, position = ?, photo = ? WHERE id = ?");
        $stmt->execute([$name, $dob, $country, $height, $price, $position, $photo, $id]);
    }
    public function topPlayer()
    {
        $stmt = $this->db->prepare("SELECT * FROM players ORDER BY price DESC LIMIT 3");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Xóa cầu thủ theo ID
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM players WHERE id = ?");
        $stmt->execute([$id]);
    }
}