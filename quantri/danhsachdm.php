<?php
include_once('ketnoi.php');

// Lấy số trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Thiết lập số lượng dòng hiển thị trên mỗi trang
$rowsPerPage = 10;

// Xác định vị trí bắt đầu của dữ liệu cần lấy
$perRow = ($page - 1) * $rowsPerPage;

// Truy vấn danh mục sản phẩm với giới hạn số lượng trang
$sql = "SELECT * FROM danhmuc LIMIT $perRow, $rowsPerPage";
$query = mysqli_query($conn, $sql);

// Truy vấn tổng số dòng trong bảng dmsanpham
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM danhmuc"));

// Tính tổng số trang
$totalPage = ceil($totalRows / $rowsPerPage);
// Tạo liên kết phân trang
$listPage = '';
$maxPagesToShow = 5; // Số trang tối đa để hiển thị
$startPage = max(1, $page - floor($maxPagesToShow / 2));
$endPage = min($totalPage, $startPage + $maxPagesToShow - 1);

// Tạo liên kết phân trang
for ($i = $startPage; $i <= $endPage; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<link rel="stylesheet" type="text/css" href="css/danhsachdm1.css" />
<h2>Quản lý danh mục</h2>
<div class="danhsachdm">
    <div class="row">
        <p id="add-dm"><a href="quantri.php?page_layout=themdm" style="text-decoration: none;"><span>Thêm danh mục
                    mới</span></a></p>
        <table id="dms" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr id="dm-bar">
                <td width="5%">ID</td>
                <td width="20%">Tên danh mục</td>
                <td width="25%">Nhà sản xuất</td>
                <td width="40%">Mô tả</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>
            <?php
            // Duyệt qua kết quả và hiển thị danh mục sản phẩm
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><span><?php echo $row['id_dm']; ?></span></td>
                    <td class="l5"><a
                            href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><?php echo $row['ten_danh_muc']; ?></a>
                    </td>
                    <td class="l5"><?php echo $row['nha_san_xuat'] ?></td>
                    <td class="l5"><?php echo $row['mo_ta'] ?></td>
                    <td><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><span>Sửa</span></a></td>
                    <td>
                        <!-- Cập nhật nút Xóa để hiển thị xác nhận -->
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id_dm']; ?>)">
                            <span>Xóa</span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="pagination">
            <ul>
                <?php echo $listPage; ?>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    function confirmDelete(id_dm) {
        // Hiển thị hộp thoại xác nhận
        var isConfirmed = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
        if (isConfirmed) {
            // Nếu người dùng xác nhận, chuyển đến trang xóa danh mục
            window.location.href = "xoadm.php?id_dm=" + id_dm;
        }
    }
</script>