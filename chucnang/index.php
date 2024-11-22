<?php
// home.php - Trang chủ website
include("ketnoi.php");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEARVN | Gaming Gear & Phụ kiện chính hãng</title>

    <link rel="stylesheet" href="../BanMayTinh/Styles/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

    <?php include '../BanMayTinh/header.php'; ?>

    <?php include '../BanMayTinh/menuNgang.php'; ?>


    <div class="main-container">
        <aside class="sidebar">
            <?php include '../BanMayTinh/sidebar.php'; ?>
        </aside>
        <div class="banner">
            <?php include '../BanMayTinh/banner.php'; ?>
        </div>
    </div>
    <div class="product-site">
        <?php include '../chucnang/sanpham/danhsachsp.php' ?>
    </div>
    <footer>
        <?php include '../BanMayTinh/footer.php'; ?>
    </footer>

</body>

</html>