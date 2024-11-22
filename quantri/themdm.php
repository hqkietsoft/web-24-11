<?php
include_once('ketnoi.php'); // Kết nối đến cơ sở dữ liệu

if (isset($_POST['submit'])) { // Kiểm tra nếu nút 'submit' được nhấn
    $ten_dm = $_POST['ten_dm'];
    $nha_san_xuat = $_POST['nha_san_xuat'];
    $mo_ta = $_POST['mo_ta'];

    if (isset($ten_dm) && !empty($ten_dm) && isset($nha_san_xuat) && !empty($nha_san_xuat) && isset($mo_ta) && !empty($mo_ta)) { // Kiểm tra các trường không rỗng
        // Câu lệnh SQL để thêm danh mục
        $sql = "INSERT INTO danhmuc (ten_danh_muc, nha_san_xuat, mo_ta) VALUES ('$ten_dm', '$nha_san_xuat', '$mo_ta')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            // In đoạn mã JavaScript để hiển thị thông báo và sau đó chuyển hướng
            echo "<script>
                    alert('Thêm danh mục thành công!');
                    window.location.href = 'quantri.php?page_layout=danhsachdm';
                  </script>";
            exit(); // Kết thúc script sau khi chuyển hướng
        } else {
            echo "Lỗi truy vấn: " . mysqli_error($conn); // Hiển thị lỗi chi tiết
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>

<link rel="stylesheet" type="text/css" href="css/themdm.css" />
<h1>Thêm Danh Mục Mới</h1>
<form method="POST" action="themdm.php"> <!-- Gửi dữ liệu đến trang hiện tại -->
    <div class="form-group">
        <label for="ten_dm">Tên danh mục</label>
        <input type="text" id="ten_dm" name="ten_dm" class="form-control" placeholder="Nhập tên danh mục" required />
    </div>
    <div class="form-group">
        <label for="nha_san_xuat">Nhà sản xuất</label>
        <input type="text" id="nha_san_xuat" name="nha_san_xuat" class="form-control" placeholder="Nhập nhà sản xuất" required />
    </div>
    <div class="form-group">
        <label for="mo_ta">Mô tả</label>
        <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả danh mục" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn-submit">Thêm mới</button> <!-- Thêm name="submit" -->
    <button type="reset" class="btn-reset">Làm mới</button>
</form>
