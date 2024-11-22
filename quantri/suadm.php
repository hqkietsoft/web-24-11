<style>
    /* Chung cho tất cả các form */

.suadm {
    width: 90%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}


/* Tiêu đề form */

h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}


/* Các nhóm form */

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

textarea {
    resize: vertical;
}

input[type="text"]:focus,
textarea:focus {
    border-color: #5b9bd5;
    outline: none;
}


/* Nút bấm */

button[type="submit"],
button[type="reset"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px;
}

button[type="submit"]:hover,
button[type="reset"]:hover {
    background-color: #45a049;
}


/* Nút làm mới */

button[type="reset"] {
    background-color: #f44336;
}

button[type="reset"]:hover {
    background-color: #e53935;
}


/* Các thông báo lỗi và thành công */

.alert {
    padding: 15px;
    background-color: #f44336;
    color: white;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 16px;
}

.alert.success {
    background-color: #4CAF50;
}

.alert.info {
    background-color: #2196F3;
}

.alert.warning {
    background-color: #ff9800;
}


/* Các trường hợp thông báo thành công */

.alert.success {
    background-color: #4CAF50;
}


/* Các trường hợp thông báo không thành công */

.alert.error {
    background-color: #f44336;
}


/* Đảm bảo các trường form có chiều cao nhất định */

textarea {
    min-height: 100px;
}

input[type="text"],
textarea {
    box-sizing: border-box;
}


/* Responsive */

@media screen and (max-width: 768px) {
    form {
        width: 90%;
    }
    h1 {
        font-size: 20px;
    }
}
</style>
<?php
include_once('ketnoi.php'); // Kết nối đến cơ sở dữ liệu

// Kiểm tra nếu có tham số 'id_dm' trong URL (tức là đang sửa danh mục)
if (isset($_GET['id_dm'])) {
    $id_dm = $_GET['id_dm']; // Lấy id danh mục từ URL

    // Truy vấn để lấy thông tin danh mục theo id_dm
    $sql = "SELECT * FROM danhmuc WHERE id_dm = '$id_dm'";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra nếu tìm thấy danh mục
    if ($row = mysqli_fetch_assoc($result)) {
        $ten_dm = $row['ten_danh_muc'];
        $nha_san_xuat = $row['nha_san_xuat'];
        $mo_ta = $row['mo_ta'];
    } else {
        echo "<script>alert('Danh mục không tồn tại'); window.location.href='quantri.php?page_layout=danhsachdm';</script>";
        exit();
    }
} else {
    echo "<script>alert('Không tìm thấy danh mục để sửa'); window.location.href='quantri.php?page_layout=danhsachdm';</script>";
    exit();
}

// Kiểm tra nếu nút 'submit' được nhấn (sửa danh mục)
if (isset($_POST['submit'])) {
    $ten_dm = $_POST['ten_dm'];
    $nha_san_xuat = $_POST['nha_san_xuat'];
    $mo_ta = $_POST['mo_ta'];

    // Kiểm tra nếu các trường nhập không thay đổi so với giá trị hiện tại
    if ($ten_dm == $row['ten_danh_muc'] && $nha_san_xuat == $row['nha_san_xuat'] && $mo_ta == $row['mo_ta']) {
        // Nếu không có thay đổi gì
        echo "<script>alert('Không có thay đổi nào để cập nhật.');
        window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
        exit();

    } else {
        // Nếu có thay đổi, thực hiện cập nhật
        if (isset($ten_dm) && !empty($ten_dm) && isset($nha_san_xuat) && !empty($nha_san_xuat) && isset($mo_ta) && !empty($mo_ta)) {
            // Cập nhật thông tin danh mục
            $sql = "UPDATE danhmuc SET ten_danh_muc = '$ten_dm', nha_san_xuat = '$nha_san_xuat', mo_ta = '$mo_ta' WHERE id_dm = '$id_dm'";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                // In đoạn mã JavaScript để hiển thị thông báo và sau đó chuyển hướng
                echo "<script>
                        alert('Cập nhật danh mục thành công!');
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
}
?>

<link rel="stylesheet" type="text/css" href="css/suadm.css" />
<h1>Sửa Danh Mục</h1>
<div class="suadm">
    <form method="POST" action="suadm.php?id_dm=<?php echo $id_dm; ?>"> <!-- Gửi dữ liệu đến trang sửa danh mục -->
        <div class="form-group">
            <label for="ten_dm">Tên danh mục</label>
            <input type="text" id="ten_dm" name="ten_dm" class="form-control" placeholder="Nhập tên danh mục"
                value="<?php echo $ten_dm; ?>" required />
        </div>
        <div class="form-group">
            <label for="nha_san_xuat">Nhà sản xuất</label>
            <input type="text" id="nha_san_xuat" name="nha_san_xuat" class="form-control"
                placeholder="Nhập nhà sản xuất" value="<?php echo $nha_san_xuat; ?>" required />
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4" placeholder="Nhập mô tả danh mục"
                required><?php echo $mo_ta; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn-submit">Cập nhật</button> <!-- Thêm name="submit" -->
        <button type="reset" class="btn-reset">Làm mới</button>
    </form>

</div>