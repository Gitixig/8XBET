<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\Order\checkout_success.php -->
<?php include __DIR__ . '/../../views/main-menu/Menu.php'; ?>

<div class="container mt-5 mb-5 text-center">
    <h2 class="text-success mb-4">🎉 Đặt hàng thành công!</h2>
    <p>Mã đơn hàng của bạn là: <strong>#<?= htmlspecialchars($orderId) ?></strong></p>
    <a href="/du_an/8XBET/index.php?controller=Home&action=home" class="btn btn-primary mt-3">🏠 Quay về trang chủ</a>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>