<?php

class ProductController
{

    public function view($id)
    {
        // Kết nối cơ sở dữ liệu
        $conn = new PDO("mysql:host=localhost;dbname=8xbet", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lấy thông tin sản phẩm theo ID
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra nếu không tìm thấy sản phẩm
        if (!$item) {
            die("Sản phẩm không tồn tại.");
        }

        // Bao gồm view chi tiết sản phẩm
        include __DIR__ . '/../views/product/Detail.php';
    }
}
