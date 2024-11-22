<?php
session_start();
$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h1>Hóa đơn thanh toán</h1>";
    echo "<table border='1'>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>";
    
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['soluong'] * $item['gia'];
        $total += $subtotal;
        echo "<tr>
                <td>" . htmlspecialchars($item['ten_sp']) . "</td>
                <td><img src='../quantri/images-laptop/" . htmlspecialchars($item['hinh_anh']) . "' width='100'></td>
                <td>" . $item['soluong'] . "</td>
                <td>" . number_format($item['gia'], 0, ',', '.') . " VND</td>
                <td>" . number_format($subtotal, 0, ',', '.') . " VND</td>
              </tr>";
    }

    echo "<tr><td colspan='4'>Tổng cộng</td><td>" . number_format($total, 0, ',', '.') . " VND</td></tr>";
    echo "</table>";

    // Thêm nút thanh toán
    echo '<a href="process_payment.php" class="btn btn-success">Thanh toán</a>';
} else {
    echo "<p>Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm.</p>";
}
?>
