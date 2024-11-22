<?php
session_start();

if (isset($_GET['id_sp'])) {
    $id_sp = (int)$_GET['id_sp'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_sp'] == $id_sp) {
            unset($_SESSION['cart'][$key]); // Xóa sản phẩm
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']); // Cập nhật chỉ mục
}

header("Location: cart.php");
exit;
?>
