<?php include __DIR__ . '/../main-menu/Menu.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Man Utd News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .news-image {
            height: 60%;
            background-size: cover;
            background-position: center;
            transition: transform 0.3s ease, filter 0.3s ease;
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
            margin-bottom: 80px;
            margin-top: 30px;
            padding-left: 10px;
            padding-right: 10px;
        }

        @media (max-width: 767.98px) {
            .news-header {
                font-size: 18px;
                margin-top: 10px;
            }
            .container-custom {
                margin-bottom: 30px;
                margin-top: 15px;
                padding-left: 2px;
                padding-right: 2px;
            }
            .news-card {
                min-height: 220px;
            }
            .row {
                margin-left: 0;
                margin-right: 0;
            }
        }

        body {
            font-family: "SourceSansProRegular", Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="news-header text-center">TODAY ON 8XBET.COM</div>
    <div class="container-custom">
        <div class="row mb-4">
            <?php for ($i = 0; $i < 1; $i++): ?>
                <div class="col-12 d-flex align-items-center justify-content-center mb-3">
                    <?php include __DIR__ . '/../product/news-card_2.php'; ?>
                </div>
            <?php endfor; ?>
        </div>
        <div class="row">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center justify-content-center mb-3">
                    <?php include __DIR__ . '/../product/news-card_3.php'; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <div class="news-header text-center">VIDEO HIGHTLIGHT IN WEEK</div>
    <div class="container-custom">
        <div class="row mb-4">
            <?php for ($i = 0; $i < 2; $i++): ?>
                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center mb-3">
                    <?php include __DIR__ . '/../product/news-card.php'; ?>
                </div>
            <?php endfor; ?>
        </div>
        <div class="row">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <div class="col-12 col-md-6 col-lg-3 d-flex align-items-center justify-content-center mb-3">
                    <?php include __DIR__ . '/../product/news-card.php'; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../layout/footer.php'; ?>
</body>

</html>