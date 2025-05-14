<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Mẫu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f8f8;
            /* Tạo hiệu ứng đậm */
        }

        .header {
            background-color: #DD0000;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .search-box {
            text-align: center;
            margin: 20px;
            border: none;
            justify-content: center;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        }

        .search-box input {
            width: 50%;
            height: 50px;
            padding: 10px;
            font-size: 35px;
            border: 5%;
            color: white;
            font-weight: 200;
            background-color: #DD0000;
            outline: none;
            font-family: 'Bebas Neue', Helvetica, sans-serif;
        }

        h1 {
            min-width: 2px;
            min-height: 2px;
            background-color: white;
        }

        input::placeholder {
            color: white;
            height: 50px;
            opacity: 0.6;
            text-align: center;
        }



        .container {
            display: flex;
            align-items: center;
        }

        .container img {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        @media (max-width: 1400px) {
            .search-box input {
                font-size: 20px;
                width: 80%;

            }

            .header {
                padding: 15px;
                font-size: 20px;
            }
        }

        .box {
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: scale(1.1);
        }

        .box:hover p {
            color: #DD0000;
        }




        .search-box input {
            width: 50%;
            height: 50px;
            padding: 10px;
            font-size: 35px;
            border: 2px solid transparent;
            color: white;
            font-weight: 200;
            background-color: #DD0000;
            outline: none;
            transition: all 0.3s ease-in-out;
            text-align: center;
        }


        .search-box input:focus {
            border-color: white;
            /* Viền sáng lên */
            box-shadow: 0px 0px 30px rgba(248, 248, 247, 0.8);
            /* Phát sáng */
            border-radius: 10px;
        }

        /* Hiệu ứng placeholder động */
        @keyframes typingEffect {
            0% {
                opacity: 0.2;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.2;
            }
        }

        .search-box input::placeholder {
            color: white;
            animation: 1.5s infinite;
            /* Placeholder nhấp nháy */
        }

        .box {
            padding: 10px;
        }

        .card {
            text-overflow: ellipsis;
            width: 420px;
            overflow: hidden;
            display: block;
            white-space: nowrap;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
            font-family: 'Source Sans Pro', Helvetica, sans-serif;
        }



        p {
            font-size: larger;
            display: inline-block;
            max-width: 280px;
            /* Giới hạn chiều rộng của phần văn bản, trừ đi chiều rộng ảnh (100px) và padding */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: center;
        }

        .search-box {
            font-family: 'Source Sans Pro', Helvetica, sans-serif;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="search-box">
            <h4>Hi There</h4>
            <input type="text" placeholder="TÌM KIẾM CẦU THỦ,CÂU HỎI THƯỜNG GẶP...">
            <h1></h1>
        </div>
    </div>
    <h3 style="text-align: center; margin-top: 30px;">
        <b>Có Thể Bạn Quan Tâm: </b>
    </h3>
    <div class="container" style="align-items: center;">
        <div class="row">
            <div class="col" style="max-width: 2500px;">
                <div class="container">
                    <div class="box1">
                        <div style="padding-top: 50px; padding-left: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">

                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="../img-MU/Alejandro-Garnacho.png" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">
                                        <p>AMORIM NAMES SIDE TO FACE FULHAMwqedqeq</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" style="max-width: 2500px;">
                <div class="container">
                    <div class="box1">
                        <div style="padding-top: 50px; padding-left: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">

                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMwqedqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col" style="max-width: 2500px;">
                <div class="container">
                    <div class="box1">
                        <div style="padding-top: 50px; padding-left: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">

                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">
                                        <p>AMORIM NAMES SIDE TO FACE FULHAMwqedqeq</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box1">
                        <div style="padding: 10px;">
                            <div class="box">
                                <a href="https://example.com/news1" style="text-decoration: none;color: inherit;">
                                    <div class="card" style=" height: 100px; display: flex; padding: 5px;">
                                        <img src="img/ba_tríc.jpg" class="img-fluid rounded-start"
                                            style="width:100px; height: 90px;">

                                        <p>AMORIM NAMES SIDE TO FACE FULHAMqweqeq</p>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>