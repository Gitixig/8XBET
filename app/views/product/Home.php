<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man Utd News</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Locomotive Scroll CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css">

    <style>
        .news-header {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .news-image {
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .news-card {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .news-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .news-content {
            padding: 10px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .news-title {
            font-weight: bold;
        }

        .news-meta {
            display: flex;
            font-size: 12px;
            color: gray;
        }

        a {
            position: relative;
            transition: color 0.3s ease;
        }

        a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 100%;
            height: 1px;
            background-color: currentColor;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        a:hover::after {
            transform: scaleX(1);
        }

        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            max-height: 600px;
            margin-bottom: 250px;
            margin-top: 30px;
        }

        body {
            font-family: "SourceSansProRegular", Helvetica, sans-serif;
        }

        /* Thêm hiệu ứng fade-up */
        .fade-up {
            /* opacity: 0; */
            transform: translateY(40px); 
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            will-change: opacity, transform; 
           
        }

        .fade-up.is-inview {
            opacity: 1;
            transform: translateY(0);
        }

        .fade-up.is-outview {
            opacity: 0;
            transform: translateY(40px);
        }
    </style>
</head>

<body>
    <!-- Locomotive scroll wrapper -->
    <div data-scroll-container>

        <div class="news-header text-center" data-scroll data-scroll-speed="2">
            TODAY ON 8XBET.COM
        </div>

        <div class="container-custom" data-scroll-section>
            <div class="row mb-4" style="height: 400px;">
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center ">
                        <!-- Thêm class fade-up và data-scroll -->
                        <div class="news-card fade-up" data-scroll data-scroll-class="is-inview" data-scroll-repeat>
                            <?php include __DIR__ . '/../product/news-card_2.php'; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="row" style="height: 300px;">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <!-- Thêm class fade-up và data-scroll -->
                        <div class="news-card fade-up" data-scroll data-scroll-class="is-inview" data-scroll-repeat>
                            <?php include __DIR__ . '/../product/news-card_2.php'; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="news-header text-center" data-scroll data-scroll-speed="2">
            VIDEO HIGHLIGHT IN WEEK
        </div>

        <div class="container-custom" data-scroll-section>
            <div class="row mb-4" style="height: 400px;">
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center ">
                        <!-- Thêm class fade-up và data-scroll -->
                        <div class="news-card fade-up" data-scroll data-scroll-class="is-inview" data-scroll-repeat>
                            <?php include __DIR__ . '/../product/news-card.php'; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="row" style="height: 300px;">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <div class="col-6 col-md-3 d-flex align-items-center justify-content-center">
                        <!-- Thêm class fade-up và data-scroll -->
                        <div class="news-card fade-up" data-scroll data-scroll-class="is-inview" data-scroll-repeat>
                            <?php include __DIR__ . '/../product/news-card.php'; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <?php include __DIR__ . '/../layout/footer.php'; ?>

    </div>

    <!-- Locomotive Scroll JS -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.js"></script>

<script>
    const scroll = new LocomotiveScroll({
        el: document.querySelector('[data-scroll-container]'),
        smooth: true,
    });

    // Lắng nghe sự kiện scroll và thêm lớp 'is-inview' khi phần tử vào khung nhìn
    scroll.on('scroll', (args) => {
        args.currentElements &&
            Object.values(args.currentElements).forEach((element) => {
                const el = element.el;

                if (element.progress > 0.1 && element.progress < 1) {
                    el.classList.add('is-inview');
                    el.classList.remove('is-outview');
                } else {
                    el.classList.remove('is-inview');
                    el.classList.add('is-outview');
                }
            });
    });
</script>
</body>

</html>