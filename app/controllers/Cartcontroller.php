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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id'], $_POST['item_type'])) {
            $itemId = intval($_POST['item_id']);
            $itemType = htmlspecialchars($_POST['item_type']); // Loại bỏ ký tự đặc biệt để tránh lỗi bảo mật

            // Khởi tạo giỏ hàng nếu chưa có
            if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Tạo key duy nhất cho từng loại sản phẩm
            $cartKey = $itemType . '_' . $itemId;

            // Nếu sản phẩm đã có trong giỏ hàng thì tăng số lượng
            if (isset($_SESSION['cart'][$cartKey])) {
                $_SESSION['cart'][$cartKey]['quantity']++;
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                $_SESSION['cart'][$cartKey] = [
                    'id'       => $itemId,
                    'type'     => $itemType,
                    'quantity' => 1
                ];
            }

            // Lấy URL chuyển hướng
            $redirectUrl = $_POST['redirect_url'] ?? '/du_an/8XBET/index.php?controller=Cart&action=index';
            header('Location: ' . $redirectUrl);
            exit;
        } else {
            error_log("Dữ liệu không hợp lệ khi thêm vào giỏ hàng: " . print_r($_POST, true));
            header('Location: /du_an/8XBET/index.php?controller=Cart&action=index&error=invalid_data');
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