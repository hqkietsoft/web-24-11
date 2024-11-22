<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Showcase</title>
  <style>
    .product-showcase {
      display: flex;
      overflow: hidden;
      width: 100%;
      position: relative;
    }

    h1 {
      text-align: center;
    }

    .product-showcase::-webkit-scrollbar {
      display: none;
    }

    .product-card {
      min-width: 200px;
      margin: 10px;
      background-color: #f1f1f1;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .product-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
    }

    .product-buttons a {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
      padding: 8px 9px;
      text-align: center;
      text-decoration: none;
      border-radius: 100px;
      transition: background-color 0.3s ease;
    }

    .product-buttons a:hover {
      background-color: #2980b9;
      /* Màu nền khi hover */
    }

    .product-buttons i {
      margin-right: 5px;
      /* Khoảng cách giữa icon và text */
    }

    .item-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .item-title {
      font-size: 1.2em;
      margin: 10px 0;
    }

    .item-price {
      font-size: 1em;
      color: #e74c3c;
    }

    .item-discount {
      text-decoration: line-through;
      color: #7f8c8d;
    }

    .slick-prev,
    .slick-next {
      background-color: rgba(255, 255, 255, 0.8);
      border: none;
      cursor: pointer;
      padding: 10px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 1;
    }

    .slick-prev {
      left: 10px;
      /* Điều chỉnh theo nhu cầu */
    }

    .slick-next {
      right: 10px;
      /* Điều chỉnh theo nhu cầu */
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>SẢN PHẨM BÁN CHẠY</h1>
    <div class="product-row-container">
      <div class="product-showcase" id="productRow">
        <?php
        include('../chucnang/ketnoi.php');

        $sql = "SELECT * FROM sanpham WHERE sanpham.id_dm BETWEEN 0 and 10";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
          ?>
          <div class="product-card">
            <img src="../quantri/images-laptop/<?php echo $row['hinh_anh']; ?>" alt="<?php echo $row['ten_sp']; ?>"
              class="item-image">
            <div class="product-details">
              <h3 class="item-title"><?php echo $row['ten_sp']; ?></h3>
              <p class="item-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>
              <div class="product-buttons">
                <a href="GioHang.php?idsp=<?php echo $row['id_sp']; ?>" title="Mua ngay"><i
                    class="fas fa-shopping-cart"></i></a>
                <a href="ChiTietLaptop.php?idsp=<?php echo $row['id_sp']; ?>" title="Xem chi tiết"><i
                    class="fas fa-info-circle"></i></a>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Include Slick CSS -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

  <!-- Include jQuery and Slick JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.product-showcase').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      });
    });

    function prevProducts() {
      $('.product-showcase').slick('slickPrev');
    }

    function nextProducts() {
      $('.product-showcase').slick('slickNext');
    }
  </script>
</body>

</html>