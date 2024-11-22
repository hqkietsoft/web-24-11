<div class="product-site">
    <!-- Laptop -->
    <?php
    include('../chucnang/ketnoi.php');
    $sql = "SELECT * FROM sanpham WHERE sanpham.id_dm BETWEEN 0 and 10";
    $query = mysqli_query($conn, $sql);
    ?>
    <h2>Laptop Acer</h2>
    <div class="product-list-container1">
        <div class="scroll-btn scroll-left" onclick="scrollProducts('left')">
            <img src="./Images/icons8-arrow-50.png" alt="">
        </div>
        <div class="product-list1">
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
        <script>
            let scrollInterval;
            const scrollAmount = 200;

            function scrollProducts(direction) {
                var productList1 = document.querySelector('.product-list1');

                if (direction === 'left') {
                    productList1.scrollBy({
                        left: -scrollAmount,
                        behavior: 'smooth'
                    });
                } else if (direction === 'right') {
                    productList1.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            }

            function startAutoScroll() {
                scrollInterval = setInterval(function() {
                    scrollProducts('right');
                }, 5000);
            }


            function stopAutoScroll() {
                clearInterval(scrollInterval);
            }

            document.addEventListener("DOMContentLoaded", function() {
                var productList1 = document.querySelector('.product-list1');

                productList1.style.transform = 'translateX(0)';
                startAutoScroll();

                productList1.addEventListener('mouseover', stopAutoScroll);
                productList1.addEventListener('mouseout', startAutoScroll);

            });
        </script>
    </div>
</div>