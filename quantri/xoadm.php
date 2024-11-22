<?php
include("ketnoi.php");
session_start();

// Kiểm tra nếu người dùng đăng nhập với tài khoản hợp lệ
if ($_SESSION['username'] == "pvkhanh" && $_SESSION['mk'] == "admin12345") {
    // Lấy id_dm từ URL
    $id_dm = $_GET['id_dm'];

    // Thực hiện truy vấn để xoá danh mục
    $sql = "DELETE FROM danhmuc WHERE id_dm = '$id_dm'";
    $query = mysqli_query($conn, $sql);

    // Kiểm tra nếu xoá thành công
    if ($query) {
        // Hiển thị thông báo xoá thành công qua JavaScript
        echo "<script>alert('Xoá danh mục thành công!');</script>";
        // Chuyển hướng về trang danh sách danh mục
        echo "<script>window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
    } else {
        echo "<script>alert('Lỗi khi xoá danh mục.');</script>";
    }
} else {
    // Nếu không phải người dùng hợp lệ, chuyển hướng về trang đăng nhập
    header('location:index.php');
}
?>
