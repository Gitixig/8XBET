<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cartItems = $_SESSION['cart'] ?? [];

if (empty($cartItems)) {
    header("Location: /du_an/8XBET/index.php?controller=Cart&action=index");
    exit;
}
$grandTotal = 0;
foreach ($cartItems as $item) {
    $grandTotal += $item['price'] * $item['quantity'];
}
include __DIR__ . '/../main-menu/Menu.php';
?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container" style="margin-top: 100px; max-width: 600px; margin-bottom: 100px;">
    <div class="card shadow-lg rounded-4">
        <div class="card-body p-5">
            <h1 class="card-title text-center text-primary mb-4 fw-bold">Thông Tin Thanh Toán</h1>

            <!-- Giỏ hàng -->
            <ul class="list-group mb-4">
                <?php foreach ($cartItems as $item): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-semibold"><?= htmlspecialchars($item['name']) ?></div>
                            <small class="text-muted">Loại: <?= htmlspecialchars($item['type']) ?></small><br>
                            <small class="text-muted">Số lượng: x<?= $item['quantity'] ?></small>
                        </div>
                        <div class="fw-bold text-primary">
                            <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VNĐ
                        </div>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between fw-bold fs-5 text-danger">
                    <span>Tổng cộng:</span>
                    <span><?= number_format($grandTotal, 0, ',', '.') ?> VNĐ</span>
                </li>
            </ul>

            <!-- Form thông tin -->
            <form method="post" action="/du_an/8XBET/index.php?controller=Order&action=confirm" class="row g-3">
                <div class="col-md-6">
                    <label for="customerName" class="form-label">Họ và tên:</label>
                    <input type="text" id="customerName" name="customerName" required class="form-control" placeholder="Nguyễn Văn A">
                </div>
                <div class="col-md-6">
                    <label for="customerEmail" class="form-label">Email:</label>
                    <input type="email" id="customerEmail" name="customerEmail" required class="form-control" placeholder="email@example.com">
                </div>
                <div class="col-md-6">
                    <label for="customerPhone" class="form-label">Số điện thoại:</label>
                    <input type="tel" id="customerPhone" name="customerPhone" required class="form-control" placeholder="0912xxxxxx" pattern="[0-9]{9,12}">
                </div>
                <div class="col-md-6">
                    <label for="shippingAddress" class="form-label">Địa chỉ giao hàng:</label>
                    <input type="text" id="shippingAddress" name="shippingAddress" required class="form-control" placeholder="123 Đường ABC, Quận XYZ">
                </div>
                <div class="col-12">
                    <label for="paymentMethod" class="form-label">Phương thức thanh toán:</label>
                    <select id="paymentMethod" name="paymentMethod" required class="form-select">
                        <option value="" disabled selected>Chọn phương thức thanh toán</option>
                        <option value="cod">Thanh toán khi nhận hàng</option>
                        <option value="paypal">PayPal</option>
                        <option value="creditcard">Thẻ tín dụng</option>
                    </select>
                </div>
                <input type="hidden" name="totalAmount" value="<?= $grandTotal ?>">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                        Xác nhận thanh toán
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php include __DIR__ . '/../layout/footer.php'; ?>
