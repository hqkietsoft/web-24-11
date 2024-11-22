<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['soluong'] as $id_sp => $soluong) {
        // Kiểm tra nếu số lượng hợp lệ
        if ($soluong > 0) {
            // Cập nhật lại số lượng trong giỏ hàng
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id_sp'] == $id_sp) {
                    $item['soluong'] = $soluong;
                    break;
                }
            }
        }
    }
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="Styles/cart.css">
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

    <h1>GIỎ HÀNG CỦA BẠN</h1>

    <?php if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])): ?>
        <p>Giỏ hàng trống.</p>
    <?php else: ?>
        <form method="POST">
            <table border="1">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $item):
                    $subtotal = $item['soluong'] * $item['gia'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['ten_sp']) ?></td>
                        <?php if (!empty($item['hinh_anh']) && file_exists('../quantri/images-laptop/' . $item['hinh_anh'])): ?>
                            <td><img src="../quantri/images-laptop/<?= htmlspecialchars($item['hinh_anh']) ?>"
                                    alt="<?= htmlspecialchars($item['ten_sp']) ?>" width="100"></td>
                        <?php else: ?>
                            <td>No image available</td>
                        <?php endif; ?>
                        <td><input type="number" name="soluong[<?= $item['id_sp'] ?>]" value="<?= $item['soluong'] ?>"
                                min="1" /></td>
                        <td><?= number_format($item['gia'], 0, ',', '.') ?> VND</td>
                        <td><?= number_format($subtotal, 0, ',', '.') ?> VND</td>
                        <td>
                            <a href="xoa_san_pham.php?id_sp=<?= $item['id_sp'] ?>"
                                onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này: <?= htmlspecialchars($item['ten_sp']) ?>?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p><strong>Tổng cộng:</strong> <?= number_format($total, 0, ',', '.') ?> VND</p>

            <button type="submit" name="update_cart">Cập nhật giỏ hàng</button>
        </form>
        <div class="container">
            <a href="checkout.php">Thanh toán</a>
        </div>
    <?php endif; ?>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>