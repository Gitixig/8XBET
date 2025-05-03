<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<?php include __DIR__ . '/../layout/header.php'; ?>

<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
    exit();
}
?>

<style>
    body {
        background-color: rgb(195, 193, 193);
    }

    .container-custom {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        display: block;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
        font-size: 16px;
    }

    .avatar-preview {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    .avatar-preview img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        cursor: pointer;
        border: 2px solid #ccc;
    }

    input[type="file"] {
        display: none;
    }
</style>

<body>
    <div class="container container-custom" style="margin-top: 30px; margin-bottom: 30px;">
        <h2 style="text-align: center;">Thêm Sân Vận Động</h2>
        <form action="/du_an/8XBET/index.php?controller=stadium&action=store" method="POST" enctype="multipart/form-data">
            <div class="avatar-preview">
                <label for="avatar-upload">
                    <img id="image" src="/du_an/8XBET/public/img/default-avatar.png" alt="Ảnh đại diện">
                </label>
                <input type="file" name="avatar" id="avatar-upload" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Tên sân vận động</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên sân vận động" required>
            </div>

            <div class="form-group">
                <label for="capacity">Sức chứa</label>
                <input type="number" id="capacity" name="capacity" required>
            </div>

            <div class="form-group">
                <label for="country">Quốc Gia</label>
                <img id="country-flag" src="">
                <?php include(__DIR__ . '/../layout/national/national.php'); ?>
            </div>



            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="text" id="price" name="price" placeholder="Nhập giá bán" required>
            </div>

            <button type="submit">Lưu Thông Tin</button>
        </form>
    </div>

    <script>
        document.getElementById('avatar-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('avatar-preview').src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('country').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var flagUrl = selectedOption.getAttribute('data-flag');
            var flagImg = document.getElementById('country-flag');
            if (flagUrl) {
                flagImg.src = flagUrl;
                flagImg.style.display = "block";
            } else {
                flagImg.style.display = "none";
            }
        });
    </script>
</body>