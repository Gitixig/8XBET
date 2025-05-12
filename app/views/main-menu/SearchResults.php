<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\main-menu\SearchResults.php -->

<?php if (!empty($results)): ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($results as $item): ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 hover-shadow transition-all">
                    <img src="<?= htmlspecialchars($item['photo'] ?? 'default.jpg') ?>"
                        class="card-img-top rounded-top-4"
                        alt="Product Image"
                        style="max-height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa;">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold mb-2">
                            <p class="card-text fs-5 fw-semibold">ID: <?= htmlspecialchars($item['id']) ?></p>
                            <?= htmlspecialchars($item['name']) ?>
                        </h5>
                        <span class="badge bg-secondary mb-2">Loại: <?= htmlspecialchars($item['type']) ?></span>
                        <p class="card-text text-danger fs-5 fw-semibold">Giá: <?= htmlspecialchars(number_format($item['price'], 0)) ?> VND</p>
                        <a href="/du_an/8XBET/index.php?controller=Product&action=view&id=<?= htmlspecialchars($item['id']) ?>"
                            class="btn btn-info mt-3">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center mt-4" role="alert">
        Không tìm thấy kết quả nào.
    </div>
<?php endif; ?>