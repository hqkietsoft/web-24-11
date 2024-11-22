<link rel="stylesheet" type="text/css" href="css/chitietsp.css" />
<div class="prd-block">
    <div class="prd-only">
        <?php
        // Kết nối MySQLi
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'webbanhang';

        $conn = new mysqli($host, $user, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy id sản phẩm từ URL và đảm bảo là số nguyên
        $id_sp = isset($_GET['id_sp']) ? (int)$_GET['id_sp'] : 0;
        $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_sp);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        } else {
            echo "Lỗi khi truy vấn dữ liệu.";
        }
        ?>
        <div class="prd-img"><img width="50%" src="anh/<?php echo htmlspecialchars($row['anh_sp']) ?>" /></div>
        <div class="prd-intro">
            <h3><?php echo htmlspecialchars($row['ten_sp']) ?></h3>
            <p class="price"><span>Giá sản phẩm: <?php echo number_format((float)preg_replace('/[^\d.]/', '', $row['gia_sp']), 0, ',', '.') ?> VNĐ</span></p>
            <table>
                <tr>
                    <td width="30%"><span>Bảo hành:</span></td>
                    <td>• <?php echo htmlspecialchars($row['bao_hanh']) ?></td>
                </tr>
                <tr>
                    <td><span>Đi kèm:</span></td>
                    <td>• <?php echo htmlspecialchars($row['phu_kien']) ?></td>
                </tr>
                <tr>
                    <td><span>Tình trạng:</span></td>
                    <td>• <?php echo htmlspecialchars($row['tinh_trang']) ?></td>
                </tr>
                <tr>
                    <td><span>Khuyến Mại:</span></td>
                    <td>• <?php echo htmlspecialchars($row['khuyen_mai']) ?></td>
                </tr>
                <tr>
                    <td><span>Còn hàng:</span></td>
                    <td>• <?php echo htmlspecialchars($row['trang_thai']) ?></td>
                </tr>
            </table>
            <p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'] ?>"><span>đặt mua</span></a></p>
        </div>

        <div class="clear"></div>

        <div class="prd-details">
            <p><?php echo nl2br(htmlspecialchars($row['chi_tiet_sp'])) ?></p>
        </div>
    </div>

    <div class="prd-comment">
        <h3>Bình luận sản phẩm</h3>
        <form method="post">
            <ul>
                <li class="required">Tên <br /><input required type="text" name="ten" /></li>
                <li class="required">Số điện thoại <br /><input required type="text" name="dien_thoai" /></li>
                <li class="required">Nội dung <br /><textarea required name="binh_luan"></textarea></li>
                <li><input type="submit" name="submit" value="Bình luận" /></li>
            </ul>
        </form>
    </div>

    <?php
    // Thêm bình luận vào cơ sở dữ liệu
    if (isset($_POST['submit'])) {
        $ten = htmlspecialchars($_POST['ten']);
        $dien_thoai = htmlspecialchars($_POST['dien_thoai']);
        $binh_luan = htmlspecialchars($_POST['binh_luan']);
        date_default_timezone_set('Asia/SaiGon');
        $ngay_gio = date('Y-m-d H:i:s');

        $sql = "INSERT INTO blsanpham (id_sp, ten, dien_thoai, binh_luan, ngay_gio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $id_sp, $ten, $dien_thoai, $binh_luan, $ngay_gio);

        if (!$stmt->execute()) {
            echo "Lỗi khi thêm bình luận.";
        }
    }
    ?>

    <div class="comment-list">
        <?php
        // Hiển thị bình luận
        $sql = "SELECT * FROM blsanpham WHERE id_sp = ? ORDER BY ngay_gio DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_sp);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                ?>
                <ul>
                    <li class="com-title"><?php echo htmlspecialchars($row['ten']) ?><br />
                        <span>
                            <?php
                            $oriDate = $row['ngay_gio'];
                            $newDate = date('d-m-Y H:i:s', strtotime($oriDate));
                            echo $newDate;
                            ?>
                        </span>
                    </li>
                    <li class="com-details"><?php echo nl2br(htmlspecialchars($row['binh_luan'])) ?></li>
                </ul>
                <?php
            }
        } else {
            echo "Lỗi khi lấy bình luận.";
        }
        ?>
    </div>

    <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div>
</div>

<?php
// Đóng kết nối MySQLi
$stmt->close();
$conn->close();
?>
