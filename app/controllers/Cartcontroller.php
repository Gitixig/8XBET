<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CoachModel.php';
require_once __DIR__ . '/../models/StadiumModel.php';
require_once __DIR__ . '/../models/PlayerModel.php';

class CartController
{
    /**
     * Hiển thị giỏ hàng
     */
    public function index()
    {
        $productModel = new ProductModel();
        $coachModel = new CoachModel();
        $stadiumModel = new StadiumModel();
        $playerModel = new PlayerModel();

        $cartItems = [];

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if (!isset($item['type'], $item['id'], $item['quantity'])) {
                    error_log("Dữ liệu giỏ hàng không hợp lệ: " . print_r($item, true));
                    continue;
                }

                $itemType = $item['type'];
                $itemId = $item['id'];
                $quantity = $item['quantity'];
                $product = null;

                // Lấy thông tin sản phẩm dựa trên loại
                if ($itemType === 'product') {
                    $product = $productModel->getProductById($itemId);
                } elseif ($itemType === 'coach') {
                    $product = $coachModel->getCoachById($itemId);
                } elseif ($itemType === 'stadium') {
                    $product = $stadiumModel->getStadiumById($itemId);
                } elseif ($itemType === 'player') {
                    $product = $playerModel->getPlayerById($itemId);
                }

                if (!$product) {
                    error_log("Không tìm thấy sản phẩm với ID: $itemId và loại: $itemType");
                    continue;
                }

                $product['quantity'] = $quantity;
                $cartItems[] = $product;
            }
        }

        // Bao gồm view giỏ hàng
        include __DIR__ . '/../views/carts/index.php';
    }

    public function add()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_type = $_POST['item_type'];
        $redirect_url = $_POST['redirect_url'];

        // Khởi tạo giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $already_in_cart = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['id'] == $item_id && $item['type'] == $item_type) {
                $already_in_cart = true;
                break;
            }
        }

        if (!$already_in_cart) {
            // Sản phẩm chưa có trong giỏ hàng, thêm nó vào
            $_SESSION['cart'][] = [
                'id' => $item_id,
                'name' => $item_name,
                'price' => $item_price,
                'type' => $item_type,
                'quantity' => 1 // Mặc định số lượng là 1 khi thêm mới
            ];
            $_SESSION['success'] = "Đã thêm '$item_name' vào giỏ hàng.";
        } else {
            // Sản phẩm đã có trong giỏ hàng
            $_SESSION['error'] = "Sản phẩm '$item_name' đã có trong giỏ hàng của bạn.";
        }

        // Chuyển hướng về trang trước
        header('Location: ' . $redirect_url);
        exit;
    }
}


    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng
     */
    public function update()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartKey = $_POST['cart_key'] ?? null;
            $quantity = $_POST['quantity'] ?? null;

            // Kiểm tra dữ liệu đầu vào
            if ($cartKey === null || $quantity === null || $quantity < 1) {
                $_SESSION['error'] = "Dữ liệu không hợp lệ.";
                header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
                exit;
            }

            // Cập nhật số lượng trong giỏ hàng
            if (isset($_SESSION['cart'][$cartKey])) {
                $_SESSION['cart'][$cartKey]['quantity'] = (int)$quantity;
                $_SESSION['success'] = "Cập nhật số lượng thành công.";
            } else {
                $_SESSION['error'] = "Không tìm thấy sản phẩm trong giỏ hàng.";
            }

            // Chuyển hướng về trang giỏ hàng
            header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
            exit;
        } else {
            $_SESSION['error'] = "Phương thức không được hỗ trợ.";
            header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
            exit;
        }
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */

    public function remove()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cartKey = $_POST['cart_key'] ?? null;

            // Kiểm tra dữ liệu đầu vào
            if ($cartKey === null) {
                $_SESSION['error'] = "Dữ liệu không hợp lệ.";
                header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
                exit;
            }

            // Xóa sản phẩm khỏi giỏ hàng
            if (isset($_SESSION['cart'][$cartKey])) {
                unset($_SESSION['cart'][$cartKey]);
                $_SESSION['success'] = "Xóa sản phẩm thành công.";
            } else {
                $_SESSION['error'] = "Không tìm thấy sản phẩm trong giỏ hàng.";
            }

            // Chuyển hướng về trang giỏ hàng
            header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
            exit;
        } else {
            $_SESSION['error'] = "Phương thức không được hỗ trợ.";
            header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
            exit;
        }
    }

    /**
     * Xóa tất cả sản phẩm trong giỏ hàng
     */
    public function clear()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa giỏ hàng
        unset($_SESSION['cart']);
        $_SESSION['success'] = "Đã xóa tất cả sản phẩm trong giỏ hàng.";

        // Chuyển hướng về trang giỏ hàng
        header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
        exit;
    }

    // Các phương thức add, remove, update, clear vẫn giữ nguyên
}