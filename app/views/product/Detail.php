<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <?php if (!empty($item)): ?>
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="<?= htmlspecialchars($item['photo'] ?? 'default.jpg') ?>" alt="Product Image" class="img-fluid rounded">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h1><?= htmlspecialchars($item['Name']) ?></h1>
                <p><strong>ID:</strong> <?= htmlspecialchars($item['id']) ?></p>
                <p><strong>Loại:</strong> <?= htmlspecialchars($item['type']) ?></p>
                <p><strong>Giá:</strong> <?= number_format($item['price'], 0) ?> VNĐ</p>

                <!-- Form thêm vào giỏ hàng -->
                <form method="post" action="/du_an/8XBET/index.php?controller=Cart&action=add">
                    <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                    <input type="hidden" name="item_name" value="<?= htmlspecialchars($item['Name']) ?>">
                    <input type="hidden" name="item_price" value="<?= $item['price'] ?>">
                    <input type="hidden" name="item_type" value="<?= htmlspecialchars($item['type']) ?>">
                    <input type="hidden" name="redirect_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

                    <button type="submit" class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">Không tìm thấy sản phẩm.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include __DIR__ . '/../layout/footer.php'; ?>
</body>
</html>
