<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartItems = $_SESSION['cart'] ?? [];

// Giả sử rằng ProductModel được đặt ở đây
require_once __DIR__ . '/../../models/ProductModel.php';
$productModel = new ProductModel();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>🛒 Giỏ hàng của bạn</h2>
        <?php if (empty($cartItems)): ?>
            <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
        <?php else: ?>
            <table class="table table-bordered">
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
                    $total = 0;
                    foreach ($cartItems as $item):
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
                        $total += $lineTotal;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['product_id']) ?></td>
                            <td><?= htmlspecialchars($name) ?></td>
                            <td><?= number_format($price, 0) ?> VNĐ</td>
                            <td><?= htmlspecialchars($quantity) ?></td>
                            <td><?= number_format($lineTotal, 0) ?> VNĐ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng tiền</strong></td>
                        <td><strong><?= number_format($total, 0) ?> VNĐ</strong></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>