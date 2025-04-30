<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy giỏ hàng từ session
$cartItems = $_SESSION['cart'] ?? [];

// Tải model sản phẩm
require_once __DIR__ . '/../../models/ProductModel.php';
$productModel = new ProductModel();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">🛒 Giỏ hàng của bạn</h2>
        <?php if (empty($cartItems)): ?>
            <div class="alert alert-info text-center">
                Chưa có sản phẩm nào trong giỏ hàng.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $grandTotal = 0;
                        foreach ($cartItems as $item):
                            // Truy vấn sản phẩm từ model
                            $product = $productModel->getProductById($item['product_id']);
                            if ($product) {
                                $name = $product['name'];
                                $price = $product['price'];
                            } else {
                                $name = "Không xác định";
                                $price = 0;
                            }
                            $quantity = $item['quantity'];
                            $lineTotal = $price * $quantity;
                            $grandTotal += $lineTotal;
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($item['product_id']) ?></td>
                                <td><?= htmlspecialchars($name) ?></td>
                                <td><?= number_format($price) ?> VNĐ</td>
                                <td><?= htmlspecialchars($quantity) ?></td>
                                <td><?= number_format($lineTotal) ?> VNĐ</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                            <td><strong><?= number_format($grandTotal, 0) ?> VNĐ</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>