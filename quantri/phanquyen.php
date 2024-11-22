<?php
session_start();
include_once('ketnoi.php');  // Kết nối cơ sở dữ liệu

$error = NULL;
$focus_field = NULL;  // Biến để lưu trữ trường cần focus khi có lỗi

// Lấy giá trị từ form post hoặc giữ giá trị cũ
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";

if (isset($_POST['submit'])) {
    // Kiểm tra trường email
    if (!isset($_POST["email"]) || $_POST["email"] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "email";
    // Kiểm tra trường mật khẩu
    } elseif (!isset($_POST['mk']) || $_POST['mk'] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "mk";
    } else {
        // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
        $sql = "SELECT * FROM thanhvien WHERE email='$email' AND mat_khau='$mk'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            // Lấy thông tin người dùng
            $row = mysqli_fetch_assoc($query);
            $_SESSION["email"] = $email;
            $_SESSION["mk"] = $mk;
            $_SESSION["role"] = $row['role'];  // Lưu vai trò vào session

            // Kiểm tra vai trò và chuyển hướng tương ứng
            if ($row['role'] == 'admin') {
                header("Location: quantri.php");  // Trang quản trị cho admin
            } else {
                header("Location: user_dashboard.php");  // Trang dành cho user
            }
            exit();
        } else {
            $error = "Tài khoản không tồn tại hoặc bạn không có quyền truy cập";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Nhóm 1 - Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap1.css">
    <style>
        .error-message {
            color: #555;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .error-field {
            border: 1px solid #dd4b39 !important;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php if (!isset($_SESSION['email'])): ?>

        <form method="post" id="loginForm">
            <?php if ($error && !isset($focus_field)): ?>
                <div class="error-message" style="text-align: center; margin-bottom: 10px; color: red; font-size: 16px">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <div id="form-login">
                <h2>Đăng nhập hệ thống quản trị</h2>

                <ul>
                    <li class="input-container">
                        <label>Tài khoản</label>
                        <input type="text" name="email" id="email" placeholder="Tài khoản E-mail"
                               value="<?php echo htmlspecialchars($email); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'email') ? 'error-field' : ''; ?>">
                    </li>
                    <li class="input-container">
                        <label>Mật khẩu</label>
                        <input type="password" name="mk" id="mk" placeholder="Mật khẩu"
                               value="<?php echo htmlspecialchars($mk); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
                    </li>
                    <li>
                        <input type="checkbox" name="check" id="check"> Ghi nhớ
                    </li>
                    <li class="button-group">
                        <input type="submit" name="submit" value="Đăng nhập">
                        <input type="reset" value="Làm mới">
                    </li>
                </ul>
            </div>

        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                <?php if (isset($focus_field)): ?>
                    var field = document.getElementById('<?php echo $focus_field; ?>');
                    field.focus();
                    // Đặt con trỏ vào cuối text
                    if (field.value.length) {
                        field.setSelectionRange(field.value.length, field.value.length);
                    }
                <?php endif; ?>
            });
        </script>

    <?php else:
        // Nếu đã đăng nhập, kiểm tra vai trò và chuyển hướng đến trang phù hợp
        if ($_SESSION['role'] == 'admin') {
            header('Location: quantri.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit();
    endif; ?>
</body>

</html>










<?php
session_start();
include_once('ketnoi.php');  // Kết nối cơ sở dữ liệu

$error = NULL;
$focus_field = NULL;  // Biến để lưu trữ trường cần focus khi có lỗi

// Lấy giá trị từ form post hoặc giữ giá trị cũ
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";

// Kiểm tra cookie nếu có
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    $email = $_COOKIE['email'];
    $mk = $_COOKIE['password'];
    $_POST['submit'] = true;  // Giả lập form đã được submit để kiểm tra đăng nhập
}

if (isset($_POST['submit'])) {
    // Kiểm tra trường email
    if (!isset($_POST["email"]) || $_POST["email"] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "email";
    // Kiểm tra trường mật khẩu
    } elseif (!isset($_POST['mk']) || $_POST['mk'] == "") {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "mk";
    } else {
        // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
        $sql = "SELECT * FROM thanhvien WHERE email='$email' AND mat_khau='$mk'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            // Lấy thông tin người dùng
            $row = mysqli_fetch_assoc($query);
            $_SESSION["email"] = $email;
            $_SESSION["mk"] = $mk;
            $_SESSION["role"] = $row['role'];  // Lưu vai trò vào session

            // Nếu người dùng chọn "Ghi nhớ", tạo cookie
            if (isset($_POST['check'])) {
                setcookie('email', $email, time() + (86400 * 30), "/");  // 30 ngày
                setcookie('password', $mk, time() + (86400 * 30), "/");  // 30 ngày
            } else {
                // Nếu không chọn "Ghi nhớ", xóa cookie
                setcookie('email', '', time() - 3600, "/");
                setcookie('password', '', time() - 3600, "/");
            }

            // Kiểm tra vai trò và chuyển hướng tương ứng
            if ($row['role'] == 'admin') {
                header("Location: quantri.php");  // Trang quản trị cho admin
            } else {
                header("Location: user_dashboard.php");  // Trang dành cho user
            }
            exit();
        } else {
            $error = "Tài khoản không tồn tại hoặc bạn không có quyền truy cập";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <title>Nhóm 1 - Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap1.css">
    <style>
        .error-message {
            color: #555;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .error-field {
            border: 1px solid #dd4b39 !important;
        }

        .input-container {
            position: relative;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php if (!isset($_SESSION['email'])): ?>

        <form method="post" id="loginForm">
            <?php if ($error && !isset($focus_field)): ?>
                <div class="error-message" style="text-align: center; margin-bottom: 10px; color: red; font-size: 16px">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <div id="form-login">
                <h2>Đăng nhập hệ thống quản trị</h2>

                <ul>
                    <li class="input-container">
                        <label>Tài khoản</label>
                        <input type="text" name="email" id="email" placeholder="Tài khoản E-mail"
                               value="<?php echo htmlspecialchars($email); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'email') ? 'error-field' : ''; ?>">
                    </li>
                    <li class="input-container">
                        <label>Mật khẩu</label>
                        <input type="password" name="mk" id="mk" placeholder="Mật khẩu"
                               value="<?php echo htmlspecialchars($mk); ?>"
                               class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
                    </li>
                    <li>
                        <input type="checkbox" name="check" id="check" <?php echo isset($_COOKIE['email']) ? 'checked' : ''; ?>> Ghi nhớ
                    </li>
                    <li class="button-group">
                        <input type="submit" name="submit" value="Đăng nhập">
                        <input type="reset" value="Làm mới">
                    </li>
                </ul>
            </div>

        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                <?php if (isset($focus_field)): ?>
                    var field = document.getElementById('<?php echo $focus_field; ?>');
                    field.focus();
                    // Đặt con trỏ vào cuối text
                    if (field.value.length) {
                        field.setSelectionRange(field.value.length, field.value.length);
                    }
                <?php endif; ?>
            });
        </script>

    <?php else:
        // Nếu đã đăng nhập, kiểm tra vai trò và chuyển hướng đến trang phù hợp
        if ($_SESSION['role'] == 'admin') {
            header('Location: quantri.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit();
    endif; ?>
</body>

</html>
