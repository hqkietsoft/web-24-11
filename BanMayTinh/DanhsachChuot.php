<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách máy tính</title>
    <link rel="stylesheet" href="./Styles/danhsachlaptop.css">
    <link rel="stylesheet" href="./Styles/style.css">

</head>

<body>
    <?php
    include('../chucnang/ketnoi.php');

    $sql = "SELECT * FROM sanpham 
            INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm where sanpham.id_dm between 36 and 40";
    $query = mysqli_query($conn, $sql);
    ?>
        <h2>Laptop Acer</h2>
    <div class="product-list-container">
        <div class="scroll-btn scroll-left" onclick="scrollProducts('left')">
            <img src="./Images/icons8-arrow-50.png" alt="">
        </div>
        <div class="product-list">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="product-item">
                    <a href="#">
                        <div class="product-image">
                            <img class="img_item" src="../quantri/images-laptop/<?php echo $row['hinh_anh']; ?>" alt="anh san pham">
                        </div>
                        <div class="box-description">
                            <h4 class="product-name"><?php echo $row['ten_sp']; ?></h4>
                            <p class="product-info">Cấu hình máy</p>
                            <p class="product-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="scroll-btn scroll-right" onclick="scrollProducts('right')">
            <img src="./Images/icons8-next-page-50.png" alt="">
        </div>
    </div>
    <script>
        let scrollInterval;
        const scrollAmount = 200; 

        function scrollProducts(direction) {
            var productList = document.querySelector('.product-list');

            if (direction === 'left') {
                productList.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else if (direction === 'right') {
                productList.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth' 
                });
            }
        }

        function startAutoScroll() {
            scrollInterval = setInterval(function () {
                scrollProducts('right');
            }, 5000);  
        }

   
        function stopAutoScroll() {
            clearInterval(scrollInterval);
        }

        
        document.addEventListener("DOMContentLoaded", function () {
            var productList = document.querySelector('.product-list');
            productList.style.transform = 'translateX(0)';

            startAutoScroll();

            productList.addEventListener('mouseover', stopAutoScroll);

            productList.addEventListener('mouseout', startAutoScroll);
        });

    </script>
</body>

</html>