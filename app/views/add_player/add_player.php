<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\player\add_player.php -->
<?php session_start(); ?>

<?php include '../layout/header.php'; ?>

<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header("Location: /du_an/8XBET/index.php?controller=auth&action=login");
    exit();
}
?>

<style>
    .container-custom {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
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
        <h2 style="text-align: center;">Thêm Cầu Thủ Mới</h2>
        <form action="/du_an/8XBET/index.php?controller=player&action=store" method="POST" enctype="multipart/form-data">
            <div class="avatar-preview">
                <label for="avatar-upload">
                    <img id="avatar-preview" src="/du_an/8XBET/public/img/default-avatar.png" alt="Ảnh đại diện">
                </label>
                <input type="file" name="avatar" id="avatar-upload" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Họ Tên</label>
                <input type="text" id="name" name="name" placeholder="Nhập tên cầu thủ" required>
            </div>

            <div class="form-group">
                <label for="dob">Ngày Sinh</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="country">Quốc Gia</label>
                <img id="country-flag" src="">
                <?php include '../layout/national/national.php'; ?>
            </div>

            <div class="form-group">
                <label for="height">Chiều Cao (cm)</label>
                <input type="number" id="height" name="height" placeholder="Nhập chiều cao (cm)" required>
            </div>

            <div class="form-group">
                <label for="price">Giá bán</label>
                <input type="text" id="price" name="price" placeholder="Nhập giá bán" required>
            </div>

            <div class="form-group">
                <label for="position">Vị Trí</label>
                <select id="position" name="position" required>
                    <option value="Tiền đạo">Tiền đạo</option>
                    <option value="Tiền vệ">Tiền vệ</option>
                    <option value="Hậu vệ">Hậu vệ</option>
                    <option value="Thủ môn">Thủ môn</option>
                </select>
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

<?php include '../layout/footer.php'; ?>