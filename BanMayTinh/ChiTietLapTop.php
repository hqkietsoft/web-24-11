<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Laptop</title>
    <link rel="stylesheet" href="Styles/chitiet.css">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/banner.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/menuNgang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'header1.php'; ?>
    <?php include 'menuNgang.php'; ?>
    <main>
        <div class="products-container">
            <?php include("ketnoi.php"); ?>
            <?php
            $id = isset($_GET['idsp']) ? intval($_GET['idsp']) : 0;
            $sql = "SELECT * FROM sanpham WHERE id_sp = $id";
            $ketqua = $conn->query($sql);
            if ($ketqua->num_rows > 0) {
                while ($dong = $ketqua->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h3>" . htmlspecialchars($dong["ten_sp"]) . "</h3>";
                    echo "<img src='../quantri/images-laptop/" . htmlspecialchars($dong["hinh_anh"]) . "' alt='" . htmlspecialchars($dong["ten_sp"]) . "' />";
                    echo "<p>" . htmlspecialchars($dong["mo_ta"]) . "</p>";
                    echo "<p class='price'>Giá: " . number_format($dong["don_gia"], 0, ',', '.') . " VND</p>";
                    if ($dong['so_luong_ton'] > 0) {
                        echo "<p>Trạng thái: còn hàng</p>";
                        echo "<p>Số lượng: <input type='number' name='soluongmua'/></p>";
                        echo "<div class='buttons'>";
                        echo "<button class='add-to-cart' onclick='addToCart(" . $dong["id_sp"] . ", \"" . htmlspecialchars($dong["ten_sp"]) . "\", " . $dong["don_gia"] . ", \"" . htmlspecialchars($dong["hinh_anh"]) . "\")'>Thêm vào giỏ hàng</button>";

                        echo "</div>";
                    } else {
                        echo "<p>Trạng thái: hết hàng</p>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm với ID này.</p>";
            }
            $conn->close();
            ?>
        </div>
    </main>

    <script>
        function addToCart(productId, tenSp, gia, hinhAnh) {
            var quantity = document.querySelector('input[name="soluongmua"]').value || 1;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "them_gio_hang.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert("Sản phẩm đã được thêm vào giỏ hàng!");
                    window.location.href = "cart.php";
                }
            };
            xhr.send("id_sp=" + productId + "&ten_sp=" + encodeURIComponent(tenSp) + "&gia=" + gia + "&soluong=" + quantity + "&hinh_anh=" + encodeURIComponent(hinhAnh));
        }
    </script>
</body>

</html>