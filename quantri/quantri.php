<?php
session_start();
include_once('ketnoi.php');
//nếu đúng thì chuyển tới admin
if ($_SESSION["username"]=="pvkhanh" && $_SESSION["mk"]=="admin12345"){
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quản Lý Bán Máy Tính</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="quantri.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 15px;">Nhóm 1<br>Quản Lý Máy Tính</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="quantri.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang quản trị</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThanhVien"
                    aria-expanded="true" aria-controls="collapseThanhVien">
                    <i class="fas fa-users" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Quản lý thành viên</span>
                </a>
                <div id="collapseThanhVien" class="collapse" aria-labelledby="headingThanhVien"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDanhMuc"
                    aria-expanded="true" aria-controls="collapseDanhMuc">
                    <i class="fas fa-folder" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Quản lý danh mục</span>
                </a>
                <div id="collapseDanhMuc" class="collapse" aria-labelledby="headingDanhMuc"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh mục:</h6>
                        <a class="collapse-item" href="quantri.php?page_layout=danhsachdm">Danh sách danh mục</a>
                        <a class="collapse-item" href="quantri.php?page_layout=themdm">Thêm danh mục</a>
                        <!-- <a class="collapse-item" href="quantri.php?page_layout=suadm">Sửa danh mục</a>
                        <a class="collapse-item" href="quantri.php?page_layout=xoadm">Xoá danh mục</a> -->
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSanPham"
                    aria-expanded="true" aria-controls="collapseSanPham">
                    <i class="fas fa-cart-plus" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseSanPham" class="collapse" aria-labelledby="headingSanPham"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sản phẩm:</h6>
                        <a class="collapse-item" href="quantri.php?page_layout=danhsachsp">Danh sách Sản Phẩm</a>
                        <a class="collapse-item" href="quantri.php?page_layout=themsp">Thêm Sản Phẩm</a>
                        <!-- <a class="collapse-item" href="quantri.php?page_layout=suasp">Sửa Sản Phẩm</a>    -->
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBinhLuan"
                    aria-expanded="true" aria-controls="collapseBinhLuan">
                    <i class="far fa-comments" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Quản lý bình luận</span>
                </a>
                <div id="collapseBinhLuan" class="collapse" aria-labelledby="headingBinhLuan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuangCao"
                    aria-expanded="true" aria-controls="collapseQuangCao">
                    <i class="fas fa-bullhorn" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Quản lý quảng cáo</span>
                </a>
                <div id="collapseQuangCao" class="collapse" aria-labelledby="headingQuangCao"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCauHinh"
                    aria-expanded="true" aria-controls="collapseCauHinh">
                    <i class="fas fa-wrench" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Cấu hình</span>
                </a>
                <div id="collapseCauHinh" class="collapse" aria-labelledby="headingCauHinh"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="dangxuat.php">
                    <i class="fas fa-user-alt" style="font-size: 13px; color: rgb(239, 235, 235);"></i>
                    <span>Đăng xuất</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!--USER -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg"
                                    style="width: 40px; height: 40px;">
                                <span class="ml-2" style="font-size: 15px;">Xin chào,
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php if (isset($_SESSION['name']))
                                            echo $_SESSION['name']; ?>
                                    </span>
                                </span>
                            </a>
                            <!-- Dropdown - User-->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Thông tin thành viên
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Cài đặt
                                </a>
                                <a class="dropdown-item" href="dangxuat.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'themsp':
                                include_once('themsp.php');
                                break;
                            case 'suasp':
                                include_once('suasp.php');
                                break;
                            case 'xoasp':
                                include_once('xoasp.php');
                                break;
                            case 'danhsachsp':
                                include_once('danhsachsp.php');
                                break;
                            case 'danhsachdm':
                                include_once('danhsachdm.php');
                                break;
                            case 'themdm':
                                include_once('themdm.php');
                                break;
                            case 'suadm':
                                include_once('suadm.php');
                                break;
                            case 'xoadm':
                                include_once('xoadm.php');
                                break;

                        }
                    } else {
                        include_once('gioithieu.php');
                    }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Phan Văn Khánh</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất không?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên làm việc hiện tại.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                    <a class="btn btn-primary" href="dangxuat.php">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php
//nếu sai thì chuyển sang index
    }else{
        header('location:index.php');
    }   
?>