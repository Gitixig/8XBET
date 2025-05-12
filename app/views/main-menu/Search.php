<!-- filepath: c:\xampp\htdocs\du_an\8XBET\app\views\main-menu\Search.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f8f8;
        }

        .header {
            background-color: #B22222;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .search-box {
            text-align: center;
            margin: 20px auto;
            position: relative;
        }

        .search-box input {
            width: 50%;
            height: 50px;
            padding: 10px;
            font-size: 28px;
            border: 2px solid transparent;
            color: white;
            background-color: #B22222;
            outline: none;
            transition: all 0.3s ease-in-out;
            text-align: center;
            font-family: 'Bebas Neue', Helvetica, sans-serif;
        }

        .search-box input:focus {
            border-color: white;
            box-shadow: 0px 0px 30px rgba(248, 248, 247, 0.8);
            border-radius: 10px;
        }

        .search-box input::placeholder {
            color: white;
            opacity: 0.6;
        }

        .card-news {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
            font-family: 'Source Sans Pro', Helvetica, sans-serif;
            transition: transform 0.3s ease;
            margin-bottom: 15px;
            background-color: white;
            border-radius: 20px;
        }

        .card-news:hover {
            transform: scale(1.02);
        }

        .card-news img {
            width: 100px;
            height: 90px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 8px;
        }

        .card-news p {
            margin: 0;
            font-size: 1rem;
            color: #000;
        }

        @media (max-width: 768px) {
            .search-box input {
                width: 90%;
                font-size: 20px;
            }

            .card-news img {
                width: 70px;
                height: 70px;
            }

            .card-news p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="search-box">
            <h4>Hi There</h4>
            <input type="text" id="search" placeholder="TÌM KIẾM CẦU THỦ, CÂU HỎI THƯỜNG GẶP..." />
        </div>
    </div>
    <div class="container mt-4" id="results">

    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="https://example.com/news1" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="../img-MU/Alejandro-Garnacho.png" alt="News Image" />
                        <p>AMORIM NAMES SIDE TO FACE FULHAM</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news2" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>CẬP NHẬT MỚI VỀ TIN CHUYỂN NHƯỢNG</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news3" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>TIN HOT: HUẤN LUYỆN VIÊN BỊ TREO GIÒ</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="https://example.com/news1" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="../img-MU/Alejandro-Garnacho.png" alt="News Image" />
                        <p>AMORIM NAMES SIDE TO FACE FULHAM</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news2" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>CẬP NHẬT MỚI VỀ TIN CHUYỂN NHƯỢNG</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news3" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>TIN HOT: HUẤN LUYỆN VIÊN BỊ TREO GIÒ</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-4">
                <a href="https://example.com/news1" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="../img-MU/Alejandro-Garnacho.png" alt="News Image" />
                        <p>AMORIM NAMES SIDE TO FACE FULHAM</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news2" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>CẬP NHẬT MỚI VỀ TIN CHUYỂN NHƯỢNG</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://example.com/news3" style="text-decoration: none; color: inherit;">
                    <div class="card-news">
                        <img src="img/ba_tríc.jpg" alt="News Image" />
                        <p>TIN HOT: HUẤN LUYỆN VIÊN BỊ TREO GIÒ</p>
                    </div>
                </a>
            </div>
        </div>
    </div>




</body>
<script>
    const searchInput = document.getElementById('search');
    const resultsContainer = document.getElementById('results');

    // Xử lý tìm kiếm khi nhấn Enter
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = searchInput.value.trim();
            if (query.length > 0) {
                performSearch(query);
            }
        }
    });

    // Hàm thực hiện tìm kiếm
    function performSearch(query) {
        fetch(`/du_an/8XBET/app/controllers/SearchController.php?q=${query}`)
            .then(response => response.text())
            .then(data => {
                resultsContainer.innerHTML = data;
            });
    }
</script>

</html>