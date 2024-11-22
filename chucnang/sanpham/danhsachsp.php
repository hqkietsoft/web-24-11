<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sản phẩm</title>
    <style>
        /* Khung chứa các sản phẩm */
        .prd-block {
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 30px;
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
            
        }

        .prd-block h2 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

       
        .product-list-container {
            position: relative;
            display: flex;
        }

        .product-list {
            display: flex;
            flex-direction: row;
            overflow-x: hidden;
            padding-bottom: 10px;
            justify-content: flex-start;
           
            transition: transform 0.5s ease-out;

            transform: translateX(100%);
        }

   
        .product-item {
            width: 200px;
            height: 320px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            position: relative;
            cursor: pointer;
            margin: 8px;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .product-price {
            font-size: 16px;
            color: #e74c3c;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Nút cuộn trái và phải */
        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 30px;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
        }

        /* Nút di chuyển sang trái */
        .scroll-left {
            left: 10px;
        }

        /* Nút di chuyển sang phải */
        .scroll-right {
            right: 10px;
        }
    </style>
</head>

<body>
    <?php
    include('ketnoi.php');  // Kết nối cơ sở dữ liệu
    
    // Truy vấn lấy sản phẩm với phân trang và kết nối bảng sanpham với bảng danhmuc
    $sql = "SELECT * FROM sanpham 
            INNER JOIN danhmuc ON sanpham.id_dm = danhmuc.id_dm";
    $query = mysqli_query($conn, $sql);
    ?>

    <!-- Hiển thị sản phẩm -->
    <div class="prd-block">
        <h2>Danh sách sản phẩm</h2>
        <div class="product-list-container">
            <div class="scroll-btn scroll-left" onclick="scrollProducts('left')">&#8249;</div>


            <div class="product-list">
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="product-item">
                        <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>">
                            <img class="product-img" src="../quantri/images-laptop/<?php echo $row['hinh_anh']; ?>"
                                alt="<?php echo $row['ten_sp']; ?>" />
                        <div class="product-details">
                            <h3 class="product-name"><?php echo $row['ten_sp']; ?></h3>
                            <p class="product-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>

                            <!-- <div class="discount">- <?php echo $row['discount_percent']; ?>%</div> Nếu có giảm giá -->
                        </div>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Nút cuộn phải -->
            <div class="scroll-btn scroll-right" onclick="scrollProducts('right')">&#8250;</div>
        </div>
    </div>

    <script>
        let scrollInterval;
        const scrollAmount = 300; // Số pixel cuộn mỗi lần

        function scrollProducts(direction) {
            var productList = document.querySelector('.product-list');

            if (direction === 'left') {
                productList.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth' // Mượt mà
                });
            } else if (direction === 'right') {
                productList.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth' // Mượt mà
                });
            }
        }

        // Hàm bắt đầu tự động cuộn
        function startAutoScroll() {
            scrollInterval = setInterval(function () {
                scrollProducts('right');
            }, 10000);  // Mỗi 3 giây sẽ cuộn một lần
        }

        // Hàm dừng cuộn
        function stopAutoScroll() {
            clearInterval(scrollInterval);
        }

        // Thêm hiệu ứng để danh sách sản phẩm xuất hiện từ phải sang trái khi trang được tải
        document.addEventListener("DOMContentLoaded", function () {
            var productList = document.querySelector('.product-list');
            productList.style.transform = 'translateX(0)'; // Di chuyển từ phải vào giữa màn hình

            // Bắt đầu cuộn tự động
            startAutoScroll();

            // Dừng cuộn khi di chuột vào
            productList.addEventListener('mouseover', stopAutoScroll);

            // Tiếp tục cuộn khi di chuột ra ngoài
            productList.addEventListener('mouseout', startAutoScroll);
        });

    </script>
</body>

</html>