<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" style="justify-content: center;" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="hahahaha.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="CLB.php">CLB</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <?php
                    if (!isset($_SESSION['UserLogin'])) {

                        echo '<li class="nav-item"><a class="nav-link" href="adduseer.php">Sign in</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                    } else {

                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                    }
                    if (isset($_SESSION['Role']) && $_SESSION['Role'] === "admin") {

                        echo '<li class="nav-item"><a class="nav-link text-warning" href="addplayer.php">Add Player</a></li>';
                        echo '<li class="nav-item"><a class="nav-link text-warning" href="listuser.php">List user</a></li>';
                        echo '<li class="nav-item"><a class="nav-link text-warning" href="CLB.php">Add CLB</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>