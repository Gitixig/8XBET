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
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 py-10">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-semibold text-blue-600 mb-6 text-center">Thông Tin Thanh Toán</h1>

        <!-- 🛒 Danh sách sản phẩm -->
        <ul class="mb-6 divide-y">
            <?php foreach ($cartItems as $item): ?>
                <li class="py-2 flex justify-between items-center">
                    <div>
                        <div class="font-semibold"><?= htmlspecialchars($item['name']) ?> (x<?= $item['quantity'] ?>)</div>
                        <div class="text-sm text-gray-500"><?= htmlspecialchars($item['type']) ?></div>
                    </div>
                    <div class="text-right text-blue-600"><?= number_format($item['price'] * $item['quantity'], 0) ?> VNĐ</div>
                </li>
            <?php endforeach; ?>
            <li class="pt-4 flex justify-between font-bold text-lg text-red-600">
                <span>Tổng cộng:</span>
                <span><?= number_format($grandTotal, 0) ?> VNĐ</span>
            </li>
        </ul>

        <!-- 📦 Form thông tin người nhận -->
        <form method="post" action="/du_an/8XBET/index.php?controller=Order&action=confirm" class="space-y-4">
            <div>
                <label for="customerName" class="block text-gray-700 text-sm font-bold mb-1">Họ và tên:</label>
                <input type="text" id="customerName" name="customerName" required class="border rounded w-full py-2 px-3 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div>
                <label for="customerEmail" class="block text-gray-700 text-sm font-bold mb-1">Email:</label>
                <input type="email" id="customerEmail" name="customerEmail" required class="border rounded w-full py-2 px-3 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div>
                <label for="customerPhone" class="block text-gray-700 text-sm font-bold mb-1">Số điện thoại:</label>
                <input type="tel" id="customerPhone" name="customerPhone" required class="border rounded w-full py-2 px-3 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div>
                <label for="shippingAddress" class="block text-gray-700 text-sm font-bold mb-1">Địa chỉ giao hàng:</label>
                <input type="text" id="shippingAddress" name="shippingAddress" required class="border rounded w-full py-2 px-3 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div>
                <label for="paymentMethod" class="block text-gray-700 text-sm font-bold mb-1">Phương thức thanh toán:</label>
                <select id="paymentMethod" name="paymentMethod" required class="border rounded w-full py-2 px-3 shadow-sm focus:outline-none focus:ring focus:border-blue-500">
                    <option value="cod">Thanh toán khi nhận hàng</option>
                    <option value="paypal">PayPal</option>
                    <option value="creditcard">Thẻ tín dụng</option>
                </select>
            </div>
            <input type="hidden" name="totalAmount" value="<?= $grandTotal ?>">

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none">
                Xác nhận thanh toán
            </button>
        </form>
    </div>
</body>

</html>