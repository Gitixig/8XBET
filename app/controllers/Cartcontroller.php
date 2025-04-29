<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class CartController
{
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        // Đường dẫn tới ProductModel (sửa lại nếu bạn có thay đổi cấu trúc thư mục)
        require_once __DIR__ . '/../../app/models/ProductModel.php';
        $productModel = new ProductModel();

        $cartItems = [];

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $product = $productModel->getProductById($item['product_id']);
                // Kiểm tra nếu sản phẩm tồn tại trước khi gán số lượng
                if ($product) {
                    $product['quantity'] = $item['quantity'];
                    $cartItems[] = $product;
                }
            }
        }

        // Bao gồm view giỏ hàng (đảm bảo đường dẫn đúng với cấu trúc dự án của bạn)
        include __DIR__ . '/../Views/carts/index.php';
    }

    /**
     * Xử lý thêm sản phẩm vào giỏ hàng
     */
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
    
            // Khởi tạo giỏ hàng nếu chưa có
            if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
    
            // Tăng số lượng nếu sản phẩm đã có, nếu chưa có thì thêm mới
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                $_SESSION['cart'][$productId] = [
                    'product_id' => $productId,
                    'quantity'   => 1
                ];
            }
    
            // Nạp cấu hình
            $config = require_once __DIR__ . '/../../config.php';
            $baseURL = isset($config['baseURL']) ? $config['baseURL'] : '/';
    
            // Lấy URL chuyển hướng từ hidden input nếu có, nếu không sử dụng HTTP_REFERER hoặc fallback baseURL
            $redirectUrl = $_POST['redirect_url'] ?? $_SERVER['HTTP_REFERER'] ?? $baseURL;
            header('Location: ' . $redirectUrl);
            exit;
        }
    }
    
}
