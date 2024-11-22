<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_sp = (int)$_POST['id_sp'];
    $ten_sp = $_POST['ten_sp'];
    $gia = (int)$_POST['gia'];
    $soluong = (int)$_POST['soluong'];
    $hinh = $_POST['hinh_anh'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_sp'] == $id_sp) {
            $item['soluong'] += $soluong; 
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'id_sp' => $id_sp,
            'ten_sp' => $ten_sp,
            'gia' => $gia,
            'soluong' => $soluong,
            'hinh_anh' => $hinh // Thêm hình ảnh vào giỏ hàng
        ];
    }

    header("Location: cart.php");
    exit;
} else {
    echo "Dữ liệu không hợp lệ.";
    exit;
}

?>
