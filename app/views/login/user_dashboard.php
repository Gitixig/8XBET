<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Trang người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <div class="container mt-5">
        <h2>Xin chào, <?= $_SESSION['user'] ?>!</h2>
        <p>Đây là trang dành cho người dùng thông thường.</p>
    </div>
</body>

</html>