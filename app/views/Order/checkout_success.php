<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-semibold text-blue-600 mb-6 text-center">Thông Tin Thanh Toán</h1>
        <form method="post" action="/checkout/process" class="space-y-4">
            <div>
                <label for="customerName" class="block text-gray-700 text-sm font-bold mb-2">Họ và tên:</label>
                <input type="text" id="customerName" name="customerName" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="customerEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" id="customerEmail" name="customerEmail" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="customerPhone" class="block text-gray-700 text-sm font-bold mb-2">Số điện thoại:</label>
                <input type="tel" id="customerPhone" name="customerPhone" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="shippingAddress" class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ giao hàng:</label>
                <input type="text" id="shippingAddress" name="shippingAddress" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div>
                <label for="paymentMethod" class="block text-gray-700 text-sm font-bold mb-2">Phương thức thanh toán:</label>
                <select id="paymentMethod" name="paymentMethod" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="cod">Thanh toán khi nhận hàng</option>
                    <option value="paypal">PayPal</option>
                    <option value="creditcard">Thẻ tín dụng</option>
                </select>
            </div>
            <div>
                <label for="totalAmount" class="block text-gray-700 text-sm font-bold mb-2">Tổng tiền:</label>
                <input type="text" id="totalAmount" name="totalAmount" required readonly value="100.000 VNĐ" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200">
                <p class="text-gray-500 text-xs italic">Vui lòng xác nhận lại tổng tiền trước khi thanh toán.</p>
            </div>
            <button type="submit" name="checkout" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                Xác nhận thanh toán
            </button>
        </form>
    </div>
</body>
</html>
