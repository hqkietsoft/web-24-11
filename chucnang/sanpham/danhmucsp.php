
<div class="l-sidebar">
    <h2>Danh Mục Máy Tính</h2>
    <ul id="main-menu">
    <?php
       include('ketnoi.php');
        // Thực hiện truy vấn
        $sql = "SELECT * FROM danhmuc";
        $query = mysqli_query($conn, $sql); // Truyền kết nối $conn vào đây

        // Lặp qua kết quả truy vấn và hiển thị danh mục sản phẩm
        while($row = mysqli_fetch_array($query)){
    ?>
        <li><a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm'] ?>&ten_danh_muc=<?php echo $row['ten_danh_muc'] ?>"><?php echo $row['ten_danh_muc'] ?></a></li>
    <?php
        }

        // Đóng kết nối sau khi sử dụng
        mysqli_close($conn);
    ?>
    </ul>
</div>
