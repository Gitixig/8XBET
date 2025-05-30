<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$config = include __DIR__ . '../../../../config.php';
$base_url = $config['base_url'];
$role = $_SESSION['role'] ?? null;
include __DIR__ . '/../main-menu/Menu.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
            height: auto;
            margin-top: 150px;
        }

        h1 {
            color: rgb(236, 237, 233);
            margin-bottom: 20px;
        }

        .menueff-input {
            padding: 15px;
            width: 100%;
            max-width: 400px;
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
            width: 100%;
            max-width: 300px;
            padding: 14px 0;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: rgb(190, 193, 195);
            border: none;
            border-radius: 10px;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

        a {
            text-decoration: none;
            color: black;
            display: block;
            margin-top: 10px;
        }

        /* Responsive cho thiết bị nhỏ */
        @media (max-width: 768px) {
            .menueff-card {
                width: 90%;
                padding: 20px;
                margin-top: 200px;
            }

            .menueff-input {
                font-size: 14px;
            }

            .menueff-button {
                font-size: 14px;
                padding: 12px 0;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <form action="<?php echo $base_url; ?>/index.php?controller=auth&action=login" method="POST">
        <div class="menueff menueff-card">
            <h1>Login</h1>
            <label for="username"></label>
            <input type="text" name="username" id="username" class="form-control menueff-input" placeholder="Username">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-control menueff-input" placeholder="Password">
            <button class="menueff-button" name="frmsubmit">Đăng nhập</button>
            <?php if (!empty($error)) { ?>
                <p><?php echo $error; ?></p>
            <?php } ?>
            <a href="/du_an/8XBET/app/views/add_User/add_User.php"><b>Bạn chưa có tài khoản? Đăng ký nhé!</b></a>
        </div>
    </form>
</body>

</html>