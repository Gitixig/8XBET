<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



// Lấy giỏ hàng từ session
$cartItems = $_SESSION['cart'] ?? [];

// Tải các model cần thiết
require_once __DIR__ . '/../../models/ProductModel.php';
require_once __DIR__ . '/../../models/CoachModel.php';
require_once __DIR__ . '/../../models/StadiumModel.php';
require_once __DIR__ . '/../../models/PlayerModel.php';

$productModel = new ProductModel();
$coachModel = new CoachModel();
$stadiumModel = new StadiumModel();
$playerModel = new PlayerModel();
?>
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
                                    <th>Loại</th>
                                    <th>Tên</th>
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
                                    $itemType = $item['type'];
                                    $itemId = $item['id'];
                                    $quantity = $item['quantity'];
                                    $product = null;

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

                                    $name = $product['name'];
                                    $price = $product['price'];
                                    $lineTotal = $price * $quantity;
                                    $grandTotal += $lineTotal;
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($itemId) ?></td>
                                        <td><?= ucfirst(htmlspecialchars($itemType)) ?></td>
                                        <td><?= htmlspecialchars($name) ?></td>
                                        <td><?= number_format($price, 0) ?> VNĐ</td>
                                        <td>
                                            <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=update" class="d-flex justify-content-center align-items-center gap-2">
                                                <input type="hidden" name="cart_key" value="<?= htmlspecialchars($key) ?>">
                                                <input type="number" name="quantity" value="<?= htmlspecialchars($quantity) ?>" min="1" class="form-control w-50">
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
                                                    <i class="bi bi-trash"></i>
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
                            <i class="bi bi-credit-card"></i> Thanh Toán
                        </button>
                    </form>
                    <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=clear">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-x-circle"></i> Xóa toàn bộ
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap + Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>

<?php include __DIR__ . '/../layout/footer.php'; ?>

</html>