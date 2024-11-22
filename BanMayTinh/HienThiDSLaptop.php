<?php
include("ketnoi.php");

$sql;
if (isset($_GET['iddm'])){
    $sql = "SELECT * FROM `sanpham` WHERE id_dm = '" . $_GET['iddm'] . "'";
}else {
    $min = $_GET['min'];
    $max = $_GET['max'];
    $sql = "SELECT * FROM sanpham WHERE id_dm BETWEEN 1 AND 10 AND don_gia BETWEEN '$min' AND '$max'";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <style>
        /* Reset some default styles */
        body, h3, p {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
        }
        .product-card {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .product-image {
            height: 200px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .product-image img {
            max-width: 100%;
            max-height: 100%;
        }
        .product-details {
            padding: 15px;
        }
        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .product-buttons {
            display: flex;
            justify-content: space-between;
        }
        .buy-now-btn, .details-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
        }
        .buy-now-btn:hover, .details-btn:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-grid">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="../quantri/images-laptop/<?php echo $row['hinh_anh']; ?>" alt="<?php echo $row['ten_sp']; ?>">
                    </div>
                    <div class="product-details">
                        <h3 class="product-name"><?php echo $row['ten_sp']; ?></h3>
                        <p class="product-price"><?php echo number_format($row['don_gia'], 0, ',', '.'); ?> VNĐ</p>
                        <div class="product-buttons">
                            <button class="buy-now-btn"><a href="GioHang.php?idsp=<?php echo $row['id_sp']; ?>" style="color: white; text-decoration: none;">Mua ngay</a></button>
                            <button class="details-btn"><a href="ChiTietLaptop.php?idsp=<?php echo $row['id_sp']; ?>" style="color: white; text-decoration: none;">Xem chi tiết</a></button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>