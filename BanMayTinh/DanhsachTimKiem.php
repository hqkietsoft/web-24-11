<?php
include('ketnoi.php');
$tt = $_GET['timkiem'];
$thongtin ='%'. $tt.'%';
$search = "SELECT sanpham.id_sp, sanpham.ten_sp, sanpham.mo_ta, danhmuc.ten_danh_muc,sanpham.don_gia ,sanpham.hinh_anh
            FROM SanPham 
            JOIN danhmuc 
            ON sanpham.id_dm = danhmuc.id_dm 
            WHERE sanpham.ten_sp LIKE '$thongtin' OR sanpham.mo_ta LIKE '$thongtin' OR danhmuc.ten_danh_muc LIKE '$thongtin';";
$result = mysqli_query($conn, $search);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        echo '<div class="product-list-container">
        <div class="product-list">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="product-item">
                    <a href="#">
                        <div class="product-image">
                            <img class="img_item" src="../quantri/images-laptop/'. $row["hinh_anh"] .'" alt="anh san pham">
                        </div>
                        <div class="box-description">
                            <h4 class="product-name">'.$row["ten_sp"].'</h4>
                            <p class="product-info">Cấu hình máy</p>
                            <p class="product-price">'. number_format($row["don_gia"], 0, ",", ".").' VNĐ</p>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>';
    }
} else {
    echo "<script>
    alert('Không tìm thấy')</script>";
}
