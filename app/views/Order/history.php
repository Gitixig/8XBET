<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\Order\history.php -->
<?php include __DIR__ . '/../main-menu/Menu.php'; ?>

<div class="container mt-5 mb-5">
    <h2 class="mb-4 text-center">📜 Lịch sử đơn hàng</h2>

    <?php if (empty($orders)): ?>
        <div class="alert alert-info text-center">
            <strong>Thông báo:</strong> Bạn chưa có đơn hàng nào.
        </div>
    <?php else: ?>
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <?php foreach ($order['items'] as $item): ?>
                        <tr>
                            <td>#<?= htmlspecialchars($order['id']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                            <td><?= number_format($order['total_price'], 0) ?> VNĐ</td>
                            <td><?= htmlspecialchars($item['product_name'] ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($item['quantity'] ?? 'N/A') ?></td>
                            <td>
                                <a href="/du_an/8XBET/index.php?controller=Order&action=detail&id=<?= htmlspecialchars($order['id']) ?>" class="btn btn-info btn-sm">
                                    Xem chi tiết
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>