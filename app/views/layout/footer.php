<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Footer Hiệu Ứng</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    footer {
      background-color: #1c1c1c;
      color: #f1f1f1;
    }

    footer a {
      color: #f1f1f1;
      text-decoration: none;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    footer a:hover {
      color: #ffcc00;
      text-decoration: underline;
      transform: translateX(4px);
    }

    .social-icons a {
      display: inline-block;
      margin-right: 10px;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-icons a:hover {
      transform: scale(1.2);
      color: #ffcc00;
    }

    footer h5 {
      margin-bottom: 1rem;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    footer h5:hover {
      color: #ffcc00;
    }
  </style>
</head>

<body>

  <footer class="pt-5 pb-4">
    <div class="container">
      <div class="row">

        <div class="col-md-3 mb-4">
          <img src="../../../public/img/img-logo/logo.png" alt="Logo" style="width: 120px;">
          <p class="mt-3">© 2025 Tên Công Ty. All rights reserved.</p>
        </div>

        <div class="col-md-2 mb-4">
          <h5 class="text-uppercase">Về chúng tôi</h5>
          <ul class="list-unstyled">
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>

        <div class="col-md-2 mb-4">
          <h5 class="text-uppercase">Sản phẩm</h5>
          <ul class="list-unstyled">
            <li><a href="#">Áo thun</a></li>
            <li><a href="#">Áo khoác</a></li>
            <li><a href="#">Phụ kiện</a></li>
          </ul>
        </div>

        <div class="col-md-2 mb-4">
          <h5 class="text-uppercase">Hỗ trợ</h5>
          <ul class="list-unstyled">
            <li><a href="#">Hướng dẫn mua hàng</a></li>
            <li><a href="#">Chính sách đổi trả</a></li>
            <li><a href="#">Bảo mật</a></li>
          </ul>
        </div>

        <div class="col-md-3 mb-4">
          <h5 class="text-uppercase">Kết nối</h5>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
            <a href="#"><i class="fab fa-youtube fa-lg"></i></a>
          </div>
        </div>

      </div>
    </div>
  </footer>

</body>

</html>