<div class="prd-block">
    <h2>sản phẩm đặc biệt</h2>
    <div class="pr-list">
    <?php
      include("ketnoi.php");
        // Truy vấn dữ liệu sản phẩm đặc biệt
        $sql = "SELECT * FROM sanpham WHERE dac_biet = 1 ORDER BY id_sp DESC LIMIT 0,6";
        $query = mysqli_query($conn, $sql);

        // Duyệt qua kết quả truy vấn và hiển thị sản phẩm
        while ($row = mysqli_fetch_array($query)) {
            // Chuyển giá sản phẩm sang kiểu số thực (float)
            $gia_sp = floatval($row['gia_sp']);
    ?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="80" height="144" src="anh/<?php echo $row['anh_sp'] ?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh'] ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
            <p class="price"><span>Giá: <?php echo number_format($gia_sp, 0, ',', '.') ?> VNĐ</span></p>
        </div>
    <?php
        }
        
        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($conn);
    ?>
        <div class="clear"></div>
    </div>
</div>
