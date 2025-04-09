<?php include __DIR__ . '/../layout/header.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Quản trị viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2>Chào quản trị viên, <?= $_SESSION['user'] ?>!</h2>
        <p>Đây là trang quản trị hệ thống.</p>
    </div>
</body>

</html>