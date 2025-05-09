<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đội hình cầu thủ Manchester United</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
            object-fit: cover;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <h1>Đội hình cầu thủ Manchester United</h1>

    <?php
    // Dữ liệu cầu thủ (bạn cần thay thế bằng dữ liệu bạn đã lấy được)
    $players = [
        [
            'name' => 'Tom Heaton',
            'position' => 'Thủ môn',
            'nationality' => 'Anh',
            'dob' => '15/04/1986',
            'image' => '../../../public/img/img-MU/TomHeaton.png' // Thay thế bằng URL thực tế
        ],
        [
            'name' => 'Altay Bayindir',
            'position' => 'Thủ môn',
            'nationality' => 'Thổ Nhĩ Kỳ',
            'dob' => '14/04/1998',
            'image' => 'url_to_altay_bayindir_image.jpg'
        ],
        [
            'name' => 'Andre Onana',
            'position' => 'Thủ môn',
            'nationality' => 'Cameroon',
            'dob' => '02/04/1996',
            'image' => 'url_to_andre_onana_image.jpg'
        ],
        [
            'name' => 'Lisandro Martinez',
            'position' => 'Hậu vệ',
            'nationality' => 'Argentina',
            'dob' => '18/01/1998',
            'image' => 'url_to_lisandro_martinez_image.jpg'
        ],
        [
            'name' => 'Noussair Mazraoui',
            'position' => 'Hậu vệ',
            'nationality' => 'Morocco',
            'dob' => '14/11/1997',
            'image' => 'url_to_noussair_mazraoui_image.jpg'
        ],
        [
            'name' => 'Diogo Dalot',
            'position' => 'Hậu vệ',
            'nationality' => 'Portugal',
            'dob' => '18/03/1999',
            'image' => 'url_to_diogo_dalot_image.jpg'
        ],
        [
            'name' => 'Matthijs de Ligt',
            'position' => 'Hậu vệ',
            'nationality' => 'Netherlands',
            'dob' => '12/08/1999',
             'image' => 'url_to_matthijs_de_ligt_image.jpg'
        ],
        [
            'name' => 'Jonny Evans',
            'position' => 'Hậu vệ',
            'nationality' => 'Ireland',
            'dob' => '03/01/1988',
             'image' => 'url_to_jonny_evans_image.jpg'
        ],
        [
             'name' => 'Harry Maguire',
             'position' => 'Hậu vệ',
             'nationality' => 'Anh',
             'dob' => '05/03/1993',
             'image' => 'url_to_harry_maguire_image.jpg'
        ],
        [
             'name' => 'Victor Lindelof',
             'position' => 'Hậu vệ',
             'nationality' => 'Thụy Điển',
             'dob' => '17/07/1994',
             'image' => 'url_to_victor_lindelof_image.jpg'
        ],
        [
             'name' => 'Luke Shaw',
             'position' => 'Hậu vệ',
             'nationality' => 'Anh',
             'dob' => '12/07/1985',
             'image' => 'url_to_luke_shaw_image.jpg'
        ],
        [
             'name' => 'Leny Yoro',
             'position' => 'Hậu vệ',
             'nationality' => 'France',
             'dob' => '13/11/2005',
             'image' => 'url_to_leny_yoro_image.jpg'
        ],
        [
             'name' => 'Ayden Heaven',
             'position' => 'Hậu vệ',
             'nationality' => 'Anh',
             'dob' => '22/09/2006',
             'image' => 'url_to_ayden_heaven_image.jpg'
        ],
        [
             'name' => 'Patrick Dorgu',
             'position' => 'Hậu vệ',
             'nationality' => 'Denmark',
             'dob' => '26/10/2004',
             'image' => 'url_to_patrick_dorgu_image.jpg'
        ],
        [
             'name' => 'Christian Eriksen',
             'position' => 'Tiền vệ',
             'nationality' => 'Denmark',
             'dob' => '14/02/1992',
             'image' => 'url_to_christian_eriksen_image.jpg'
        ],
        [
             'name' => 'Kobbie Mainoo',
             'position' => 'Tiền vệ',
             'nationality' => 'Anh',
             'dob' => '19/04/2005',
             'image' => 'url_to_kobbie_mainoo_image.jpg'
        ],
        [
             'name' => 'Toby Collyer',
             'position' => 'Tiền vệ',
             'nationality' => 'Anh',
             'dob' => '03/01/2004',
             'image' => 'url_to_toby_collyer_image.jpg'
        ],
        [
             'name' => 'Casemiro',
             'position' => 'Tiền vệ',
             'nationality' => 'Brazil',
             'dob' => '23/02/1992',
             'image' => 'url_to_casemiro_image.jpg'
        ],
        [
             'name' => 'Mason Mount',
             'position' => 'Tiền vệ',
             'nationality' => 'Anh',
             'dob' => '10/01/1999',
             'image' => 'url_to_mason_mount_image.jpg'
        ],
        [
             'name' => 'Manuel Ugarte',
             'position' => 'Tiền vệ',
             'nationality' => 'Uruguay',
             'dob' => '11/04/2001',
             'image' => 'url_to_manuel_ugarte_image.jpg'
        ],
        [
             'name' => 'Bruno Fernandes',
             'position' => 'Tiền vệ',
             'nationality' => 'Portugal',
             'dob' => '08/09/1994',
             'image' => 'url_to_bruno_fernandes_image.jpg'
        ],
        [
             'name' => 'Amad Diallo',
             'position' => 'Tiền đạo',
             'nationality' => 'Bờ Biển Ngà',
             'dob' => '11/07/2002',
             'image' => 'url_to_amad_diallo_image.jpg'
        ],
        [
             'name' => 'Rasmus Hojlund',
             'position' => 'Tiền đạo',
             'nationality' => 'Denmark',
             'dob' => '04/02/2003',
             'image' => 'url_to_rasmus_hojlund_image.jpg'
        ],
        [
             'name' => 'Alejandro Garnacho',
             'position' => 'Tiền đạo',
             'nationality' => 'Argentina',
             'dob' => '01/07/2004',
             'image' => 'url_to_alejandro_garnacho_image.jpg'
        ],
        [
             'name' => 'Joshua Zirkzee',
             'position' => 'Tiền đạo',
             'nationality' => 'Netherlands',
             'dob' => '22/05/2001',
             'image' => 'url_to_joshua_zirkzee_image.jpg'
        ],
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Vị trí</th>
                <th>Quốc tịch</th>
                <th>Ngày sinh</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($players as $player): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($player['image']); ?>" alt="<?php echo htmlspecialchars($player['name']); ?>"></td>
                    <td><?php echo htmlspecialchars($player['name']); ?></td>
                    <td><?php echo htmlspecialchars($player['position']); ?></td>
                    <td><?php echo htmlspecialchars($player['nationality']); ?></td>
                    <td><?php echo htmlspecialchars($player['dob']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>