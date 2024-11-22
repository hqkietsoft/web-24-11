<style>
/* File: css/themsp.css */

/* Container chính của form */
.form-suasp {
    width: 90%;
    max-width: 800px;
    margin: 20px auto;
    padding: 25px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: 600;
    color: #444;
    margin-bottom: 6px;
    font-size: 14px;
}

input[type="text"],
input[type="file"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    margin-top: 3px;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
textarea:focus,
select:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 4px 0 gray;
}

input[type="file"] {
    padding: 4px;
}

textarea {
    resize: vertical;
    /* Cho phép thay đổi kích thước theo chiều dọc */
}

.radio-group {
    display: flex;
    gap: 15px;
    align-items: center;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"],
input[type="reset"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
    transition: background-color 0.3s;
}

input[type="reset"] {
    background-color: #f44336;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #45a049;
}

input[type="reset"]:hover {
    background-color: #e53935;
}

img {
    margin-top: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100px;
    height: auto;
}

span.error {
    color: #e53935;
    font-size: 13px;
    display: block;
    margin-top: 5px;
}
</style>

<?php
include_once('ketnoi.php'); // Kết nối đến cơ sở dữ liệu

// Lấy ID sản phẩm từ tham số GET
$id_sp = $_GET['id_sp'];

// Lấy thông tin sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM sanpham WHERE id_sp = '$id_sp'";
$result = mysqli_query($conn, $sql);

if ($arr = mysqli_fetch_assoc($result)) {
?>
    <link rel="stylesheet" type="text/css" href="css/suasp.css" />
    <h2>Cập nhật thông tin sản phẩm</h2>
    <div class="form-suasp">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten_sp">Tên sản phẩm</label>
                <input type="text" id="ten_sp" name="ten_sp" value="<?php echo isset($_POST['ten_sp']) ? $_POST['ten_sp'] : $arr['ten_sp']; ?>" />
                <?php if (isset($errors['ten_sp'])) echo $errors['ten_sp']; ?>
            </div>

            <div class="form-group">
                <label for="hinh_anh">Ảnh mô tả</label>
                <input type="file" id="hinh_anh" name="hinh_anh" />
                <img src="images-laptop/<?php echo $arr['hinh_anh']; ?>" width="100" alt="Ảnh sản phẩm" />
                <input type="hidden" name="hinh_anh_cu" value="<?php echo $arr['hinh_anh']; ?>" />
            </div>

            <div class="form-group">
                <label for="id_dm">Nhà cung cấp</label>
                <select id="id_dm" name="id_dm">
                    <?php
                    $sqlDm = "SELECT * FROM danhmuc";
                    $queryDm = mysqli_query($conn, $sqlDm);

                    while ($arrDm = mysqli_fetch_array($queryDm)) {
                        $selected = ($arrDm['id_dm'] == $arr['id_dm']) ? 'selected' : '';
                        echo "<option value='{$arrDm['id_dm']}' $selected>{$arrDm['ten_danh_muc']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="so_luong_ton">Số lượng tồn</label>
                <input type="text" id="so_luong_ton" name="so_luong_ton" style="width: 94%;" value="<?php echo isset($_POST['so_luong_ton']) ? $_POST['so_luong_ton'] : $arr['so_luong_ton']; ?>" />
                <?php if (isset($errors['so_luong_ton'])) echo $errors['so_luong_ton']; ?>
            </div>

            <div class="form-group">
                <label for="don_gia">Đơn giá</label>
                <input type="text" id="don_gia" name="don_gia" style="width: 94%;" value="<?php echo isset($_POST['don_gia']) ? $_POST['don_gia'] : $arr['don_gia']; ?>" /> VNĐ
                <?php if (isset($errors['don_gia'])) echo $errors['don_gia']; ?>
            </div>

            <div class="form-group">
                <label for="mo_ta">Mô tả</label>
                <textarea id="mo_ta" name="mo_ta" rows="5"><?php echo isset($_POST['mo_ta']) ? $_POST['mo_ta'] : $arr['mo_ta']; ?></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Cập nhật" />
                <input type="reset" name="reset" value="Làm mới" />
            </div>
        </form>
    </div>
<?php
}

// Xử lý cập nhật dữ liệu
if (isset($_POST['submit'])) {
    $errors = [];

    // Kiểm tra và xử lý các trường dữ liệu
    $ten_sp = mysqli_real_escape_string($conn, $_POST['ten_sp']);
    $don_gia = mysqli_real_escape_string($conn, $_POST['don_gia']);
    $so_luong_ton = mysqli_real_escape_string($conn, $_POST['so_luong_ton']);
    $id_dm = mysqli_real_escape_string($conn, $_POST['id_dm']);
    $mo_ta = mysqli_real_escape_string($conn, $_POST['mo_ta']);

    if (empty($ten_sp)) {
        $errors['ten_sp'] = '<span style="color:red;">(*) Tên sản phẩm không được để trống.</span>';
    }

    if (empty($don_gia)) {
        $errors['don_gia'] = '<span style="color:red;">(*) Giá sản phẩm không được để trống.</span>';
    }

    // Kiểm tra nếu có ảnh mới được tải lên
    if ($_FILES['hinh_anh']['name'] != '') {
        $hinh_anh = mysqli_real_escape_string($conn, $_FILES['hinh_anh']['name']);
        $tmp = $_FILES['hinh_anh']['tmp_name'];
    } else {
        $hinh_anh = $_POST['hinh_anh_cu']; // Giữ nguyên ảnh cũ nếu không tải ảnh mới
    }

    // Kiểm tra nếu không có lỗi thì tiến hành cập nhật
    if (empty($errors)) {
        // Nếu có ảnh mới, tiến hành upload
        if ($_FILES['hinh_anh']['name'] != "") {
            move_uploaded_file($tmp, 'hinh-anh/' . $hinh_anh);
        }

        // Cập nhật dữ liệu sản phẩm
        $sqlUpdate = "UPDATE sanpham SET ten_sp = '$ten_sp', id_dm = '$id_dm', don_gia = '$don_gia', so_luong_ton = '$so_luong_ton', mo_ta = '$mo_ta', hinh_anh = '$hinh_anh' WHERE id_sp = '$id_sp'";

        if (mysqli_query($conn, $sqlUpdate)) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
        } else {
            echo "<script>alert('Cập nhật không thành công!');</script>";
        }
    }
}
?>
