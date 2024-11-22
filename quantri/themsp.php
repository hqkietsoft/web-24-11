<?php
include('ketnoi.php');

// Khai báo các biến với giá trị mặc định để tránh lỗi "undefined variable"
$id_dm = '';
$ten_sp = '';
$so_luong_ton = '';
$don_gia = '';
$mo_ta = '';
$hinh_anh = '';

// Lấy danh sách nhà cung cấp từ cơ sở dữ liệu
$sqlDm = "SELECT * FROM danhmuc";
$queryDm = mysqli_query($conn, $sqlDm);

// Kiểm tra form đã được gửi chưa
if (isset($_POST['submit'])) {
    // Lấy giá trị từ form
    $ten_sp = $_POST['ten_sp'];
    $id_dm = $_POST['id_dm'];
    $so_luong_ton = $_POST['so_luong_ton'];
    $don_gia = $_POST['don_gia'];
    $mo_ta = $_POST['mo_ta'];

    // Kiểm tra ảnh sản phẩm đã được chọn chưa
    if (empty($_FILES['hinh_anh']['name'])) {
        $error_hinh_anh = '<span style="color:red;">(*) Vui lòng chọn ảnh sản phẩm</span>';
    } else {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $tmp_name = $_FILES['hinh_anh']['tmp_name'];

        // Kiểm tra và tạo thư mục 'anh/' nếu chưa tồn tại
        if (!file_exists('images-laptop')) {
            mkdir('images-laptop', 0777, true); // Tạo thư mục với quyền ghi đầy đủ
        }

        // Kiểm tra nếu ảnh tải lên không thành công
        if (!move_uploaded_file($tmp_name, 'images-laptop/' . $hinh_anh)) {
            $error_hinh_anh = '<span style="color:red;">(*) Lỗi khi tải ảnh lên</span>';
        }
    }

    // Kiểm tra xem nhà cung cấp có được chọn không
    if ($id_dm == 'unselect') {
        $error_id_dm = '<span style="color:red;">(*) Vui lòng chọn nhà cung cấp</span>';
    }

    // Kiểm tra tên sản phẩm đã tồn tại chưa
    $sqlCheck = "SELECT * FROM sanpham WHERE ten_sp = '$ten_sp'";
    $queryCheck = mysqli_query($conn, $sqlCheck);
    if (mysqli_num_rows($queryCheck) > 0) {
        $error_ten_sp = '<span style="color:red;">(*) Sản phẩm này đã tồn tại trong cơ sở dữ liệu</span>';
    }

    // Nếu không có lỗi, tiến hành thêm sản phẩm
    if (!isset($error_hinh_anh) && !isset($error_id_dm) && !isset($error_ten_sp)) {
        // Kiểm tra các trường nhập liệu có hợp lệ không
        if (empty($ten_sp) || empty($so_luong_ton) || empty($don_gia) || empty($mo_ta)) {
            $error_form = '<span style="color:red;">(*) Vui lòng điền đầy đủ thông tin.</span>';
        } else {
            // Thực hiện câu lệnh SQL để thêm sản phẩm vào cơ sở dữ liệu
            $sql = "INSERT INTO sanpham (ten_sp, id_dm, so_luong_ton, don_gia, mo_ta, hinh_anh)
                    VALUES ('$ten_sp', '$id_dm', '$so_luong_ton', '$don_gia', '$mo_ta', '$hinh_anh')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "<script>
                        alert('Thêm mới sản phẩm thành công!');
                        window.location.href = 'quantri.php?page_layout=danhsachsp'; // Điều hướng về danh sách sản phẩm
                      </script>";
            } else {
                echo "<script>
                        alert('Lỗi khi thêm sản phẩm: " . mysqli_error($conn) . "');
                      </script>";
            }
        }
    }
}
?>

<script>
    function validateForm() {
        var ten_sp = document.forms["productForm"]["ten_sp"];
        var id_dm = document.forms["productForm"]["id_dm"];
        var so_luong_ton = document.forms["productForm"]["so_luong_ton"];
        var don_gia = document.forms["productForm"]["don_gia"];
        var mo_ta = document.forms["productForm"]["mo_ta"];
        var hinh_anh = document.forms["productForm"]["hinh_anh"];

        if (ten_sp.value.trim() === "") {
            alert("Vui lòng nhập tên sản phẩm.");
            ten_sp.focus();
            return false;
        }
        if (id_dm.value === "unselect") {
            alert("Vui lòng chọn nhà cung cấp.");
            id_dm.focus();
            return false;
        }
        if (so_luong_ton.value.trim() === "") {
            alert("Vui lòng nhập số lượng tồn.");
            so_luong_ton.focus();
            return false;
        }
        if (don_gia.value.trim() === "") {
            alert("Vui lòng nhập đơn giá.");
            don_gia.focus();
            return false;
        }
        if (mo_ta.value.trim() === "") {
            alert("Vui lòng nhập mô tả.");
            mo_ta.focus();
            return false;
        }
        if (hinh_anh.value.trim() === "") {
            alert("Vui lòng chọn ảnh sản phẩm.");
            hinh_anh.focus();
            return false;
        }
        return true;
    }
</script>

<link rel="stylesheet" type="text/css" href="css/themsp.css">
<h2>Thêm mới sản phẩm</h2>
<div class="themsp">
    <div class="row">
        <form name="productForm" method="post" enctype="multipart/form-data" action="quantri.php?page_layout=themsp"
            onsubmit="return validateForm()">
            <!-- Các trường nhập liệu của form -->
            <div class="left-column">
                <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><label>Tên sản phẩm</label><br />
                            <input type="text" name="ten_sp" value="<?php echo htmlspecialchars($ten_sp); ?>" />
                            <?php if (isset($error_ten_sp))
                                echo $error_ten_sp; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nhà cung cấp</label><br />
                            <select name="id_dm">
                                <option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
                                <?php while ($rowDm = mysqli_fetch_array($queryDm)) { ?>
                                    <option value="<?php echo $rowDm['id_dm']; ?>" <?php echo ($id_dm == $rowDm['id_dm']) ? 'selected' : ''; ?>>
                                        <?php echo $rowDm['ten_danh_muc']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <?php if (isset($error_id_dm))
                                echo $error_id_dm; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Số lượng tồn</label><br />
                            <input type="text" name="so_luong_ton"
                                value="<?php echo htmlspecialchars($so_luong_ton); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><label>Đơn giá</label><br />
                            <input type="text" name="don_gia" style="width: 320px;"
                                value="<?php echo htmlspecialchars($don_gia); ?>" /> VNĐ
                        </td>
                    </tr>
                    <tr></tr>
                </table>
                <!-- Nút submit và reset -->
                <input type="submit" name="submit" value="Thêm mới" />
                <input type="reset" name="reset" value="Làm mới" />
                <?php if (isset($error_form))
                    echo $error_form; ?>
            </div>

            <div class="right-column">
                <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><label>Hình ảnh</label><br />
                            <input type="file" name="hinh_anh" />
                            <?php if (isset($error_hinh_anh))
                                echo $error_hinh_anh; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Mô tả</label><br />
                            <textarea cols="60" rows="12"
                                name="mo_ta"><?php echo htmlspecialchars($mo_ta); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>


        </form>
    </div>
</div>