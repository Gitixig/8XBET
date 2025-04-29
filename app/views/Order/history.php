<?php include '../main-menu/Menu.php'; ?>

<div class="container mt-5 mb-5">
    <h2 class="mb-4 text-center">📜 Lịch sử đơn hàng</h2>

    <?php if (empty($orders)): ?>
        <div class="alert alert-info text-center">Bạn chưa có đơn hàng nào.</div>
    <?php else: ?>
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>#<?= $order['id'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></td>
                        <td><?= $order['status'] ?></td>
                        <td><?= number_format($order['total_amount'], 0) ?> VNĐ</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include '../layout/footer.php'; ?>