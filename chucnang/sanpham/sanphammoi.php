<div class="prd-block">
    <h2>sản phẩm mới về</h2>
    <div class="pr-list">
    <?php
        // Kết nối cơ sở dữ liệu MySQLi
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'webbanhang';

        // Kết nối tới cơ sở dữ liệu
        $conn = mysqli_connect($host, $user, $password, $dbname);

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Truy vấn dữ liệu sản phẩm mới
        $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 6";
        $query = mysqli_query($conn, $sql);

        // Duyệt qua các sản phẩm và hiển thị
        while($row = mysqli_fetch_array($query)){
    ?>
         <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="80" height="144" src="anh/<?php echo $row['anh_sp'] ?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh'] ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
            <p class="price"><span>Giá: <?php echo number_format((float)preg_replace('/[^\d.]/', '', $row['gia_sp']), 0, ',', '.') ?> VNĐ</span></p>
        </div>
    <?php
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($conn);
    ?>
        <div class="clear"></div>
    </div>
</div>
