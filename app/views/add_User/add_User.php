<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<style>
    body {
        margin: 0;
        height: 100vh;
        font-family: Arial, sans-serif;
        background-image: url('/du_an/8XBET/public/img/sanbong_login.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
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

    .menueff-button:hover {
        background-color: white;
        color: black;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    p {
        color: red;
        font-size: 16px;
        margin-top: 10px;
    }

    .admin-options {
        margin-top: 20px;
        text-align: center;
    }

    .admin-options a {
        display: inline-block;
        margin: 10px;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #007bff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .admin-options a:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <form action="/du_an/8XBET/index.php?controller=user&action=addUser" method="POST">
        <div class="menueff menueff-card">
            <h1>SIGN UP</h1>
            <label for="fullname"></label>
            <input type="text" name="fullname" id="fullname" class="form-control menueff menueff-input" placeholder="Nhập tên đầy đủ">
            <label for="username"></label>
            <input type="text" name="username" id="username" class="form-control menueff menueff-input" placeholder="Nhập tên đăng nhập">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-control menueff menueff-input" placeholder="Nhap mật khẩu">
            <button class="menueff menueff-button" name="frmsubmit">Tạo tài khoản</button>
        </div>
    </form>
</body>