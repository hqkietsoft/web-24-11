<?php
include("ketnoi.php");
session_start();

// Kiểm tra nếu người dùng đăng nhập với tài khoản hợp lệ
if ($_SESSION['username'] == "pvkhanh" && $_SESSION['mk'] == "admin12345") {
    // Kiểm tra nếu có tham số 'id_sp' trong URL
    if (isset($_GET['id_sp'])) {
        $id_sp = $_GET['id_sp'];

        // Thực hiện truy vấn để xoá sản phẩm
        $sql = "DELETE FROM sanpham WHERE id_sp = '$id_sp'";
        $query = mysqli_query($conn, $sql);

        // Kiểm tra nếu xoá thành công
        if ($query) {
            echo "<script>alert('Xoá sản phẩm thành công!');</script>";
            // Chuyển hướng về trang danh sách sản phẩm
            echo "<script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
        } else {
            echo "<script>alert('Lỗi khi xoá sản phẩm.');</script>";
        }
    } else {
        echo "<script>alert('Không có ID sản phẩm để xóa.');</script>";
        // Chuyển hướng về trang danh sách sản phẩm nếu không có 'id_sp'
        echo "<script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
    }
} else {
    // Nếu không phải người dùng hợp lệ, chuyển hướng về trang đăng nhập
    header('location:index.php');
}
?>
