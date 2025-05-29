<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\carts\index.php -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartItems = $_SESSION['cart'] ?? [];
?>
<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-danger text-white text-center rounded-top-4">
                <h2 class="mb-0">🛒 Giỏ hàng của bạn</h2>
            </div>
            <div class="card-body bg-white">
                <?php if (empty($cartItems)): ?>
                    <div class="alert alert-info text-center mb-0">
                        Chưa có sản phẩm nào trong giỏ hàng.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>Mã</th>
                                    <th>Tên</th>
                                    <th>Loại</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandTotal = 0;
                                foreach ($cartItems as $key => $item):
                                    $lineTotal = $item['price'] * $item['quantity'];
                                    $grandTotal += $lineTotal;
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['id']) ?></td>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td><?= htmlspecialchars($item['type']) ?></td>
                                        <td><?= number_format($item['price'], 0) ?> VNĐ</td>
                                        <td><?= htmlspecialchars($item['quantity']) ?>
                                            <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=update" class="d-flex justify-content-center align-items-center gap-2">
                                                <input type="hidden" name="cart_key" value="<?= htmlspecialchars($key) ?>">
                                                <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" min="1" class="form-control w-50">
                                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-arrow-repeat"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td><?= number_format($lineTotal, 0) ?> VNĐ</td>
                                        <td>
                                            <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=remove">
                                                <input type="hidden" name="cart_key" value="<?= htmlspecialchars($key) ?>">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    Xóa
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                                    <td colspan="2" class="fw-bold text-danger"><?= number_format($grandTotal, 0) ?> VNĐ</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($cartItems)): ?>
                <div class="card-footer bg-light d-flex justify-content-end gap-2 rounded-bottom-4">
                    <form method="post" action="/du_an/8XBET/index.php?controller=Order&action=checkout">
                        <button type="submit" class="btn btn-success">
                            Thanh Toán
                        </button>
                    </form>
                    <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=clear">
                        <button type="submit" class="btn btn-warning">
                            Xóa toàn bộ
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include __DIR__ . '/../layout/footer.php'; ?>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>