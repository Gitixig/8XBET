<?php include __DIR__ . '/../layout/header.php'; ?>

<style>
    body {
        margin: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-image: url('/du_an/8XBET/public/img/img-backgroud_login.jpg');
        /* Nếu file ảnh trong cùng thư mục */
        background-size: cover;
        /* Hiển thị toàn bộ màn hình */
        background-position: center;
        /* Căn giữa ảnh */
        background-repeat: no-repeat;
        /* Không lặp lại ảnh */
    }

    .menueff {
        background-color: rgb(190, 193, 195);
        border-radius: 20px;
        box-shadow: 10px 10px 20px #a3b1c6, -10px -10px 20px #ffffff;
        display: flex;
        justify-content: center;
        margin: auto;

    }

    .menueff-inset {
        background-color: #e0e5ec;
        border-radius: 20px;
        box-shadow: inset 10px 10px 20px #a3b1c6, inset -10px -10px 20px #ffffff;
    }

    .menueff-card {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
        text-align: center;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        width: 600px;
        height: 400px;
        margin-top: 150px;

    }

    h1 {
        color: rgb(236, 237, 233);
        margin-bottom: 20px;
    }

    .menueff-input {
        padding: 15px;
        width: 80%;
        font-size: 16px;
        color: #6d7852;
        border: none;
        outline: none;
        margin-bottom: 10px;
        border-radius: 10px;
        box-shadow: inset 5px 5px 10px #a3b1c6, inset -5px -5px 10px #ffffff;
        background: #e0e5ec;
    }

    .menueff-input::placeholder {
        color: #a3b1c6;
    }

    .menueff-button {
        padding: 15px 30px;
        font-size: 16px;
        color: rgb(89, 118, 18);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: rgb(190, 193, 195);
        border-radius: 10px;
        box-shadow: 5px 5px 10px #a3b1c6, -5px -5px 10px #ffffff;
    }

    .menueff-button:active {
        background-color: #d1d9e6;
        border: 1px solid rgb(240, 244, 249);
    }
</style>

<body>
    <form action="AuthController.php" method="POST">
        <div class="menueff menueff-card">
            <h1>Login</h1>
            <label for="username"></label>
            <input type="text" name="username" id="username" class="form-control menueff menueff-input" placeholder="Username">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-control menueff menueff-input" placeholder="Password">
            <button class="menueff menueff-button" name="frmsubmit">Login</button>
            <a href="/du_an/8XBET/app/views/add_User/add_User.php" style="margin-top: 5px;">Bạn chưa có tài khoản? Đăng ký nhé!</a>
        </div>
    </form>
</body