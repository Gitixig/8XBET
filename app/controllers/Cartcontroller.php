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
        // Sửa đường dẫn tới ProductModel cho khớp với cấu trúc dự án của bạn
        require_once __DIR__ . '/../../models/ProductModel.php';
        $productModel = new ProductModel();

        $cartItems = [];

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                // Lấy thông tin sản phẩm từ DB theo product_id
                $product = $productModel->getProductById($item['product_id']);
                // Nếu tồn tại sản phẩm, gán số lượng từ session cho sản phẩm
                if ($product) {
                    $product['quantity'] = $item['quantity'];
                    $cartItems[] = $product;
                }
            }
        }

        // Bao gồm view giỏ hàng với đường dẫn đúng
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

            // Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng lên 1
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                // Sửa đường dẫn tới ProductModel cho khớp với cấu trúc dự án của bạn
                require_once __DIR__ . '/../models/ProductModel.php';
                $productModel = new ProductModel();
                $product = $productModel->getProductById($productId);
                if ($product) {
                    $_SESSION['cart'][$productId] = [
                        'product_id' => $productId,
                        'name'       => $product['name'],   // Lấy tên sản phẩm từ DB
                        'price'      => $product['price'],  // Lấy giá sản phẩm từ DB
                        'quantity'   => 1
                    ];
                } else {
                    // Nếu không tìm thấy sản phẩm, ta chỉ lưu product_id và quantity
                    $_SESSION['cart'][$productId] = [
                        'product_id' => $productId,
                        'quantity'   => 1
                    ];
                }
            }

            // Nạp cấu hình và lấy URL chuyển hướng
            $config = require_once __DIR__ . '/../../config.php';
            $baseURL = isset($config['baseURL']) ? $config['baseURL'] : '/';

            // Lấy URL chuyển hướng từ hidden input nếu có, nếu không sử dụng HTTP_REFERER hoặc fallback baseURL.
            $redirectUrl = $_POST['redirect_url'] ?? $_SERVER['HTTP_REFERER'] ?? $baseURL;
            header('Location: ' . $redirectUrl);
            exit;
        }
    }
}
