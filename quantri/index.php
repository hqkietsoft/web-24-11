<?php
session_start();
include_once('ketnoi.php');

$error = NULL;
// Lấy giá trị từ form post hoặc giữ giá trị cũ
$username = isset($_POST["username"]) ? $_POST["username"] : "";
$mk = isset($_POST["mk"]) ? $_POST["mk"] : "";

if (isset($_POST['submit'])) {
    if (empty($_POST["username"])) {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "username";
    } elseif (empty($_POST['mk'])) {
        $error = "Vui lòng điền vào trường này";
        $focus_field = "mk";
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$mk'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            // Lấy dữ liệu người dùng
            $row = mysqli_fetch_assoc($query);
            
            // Lưu các thông tin vào session
            $_SESSION["username"] = $username;
            $_SESSION["mk"] = $mk;
            $_SESSION["name"] = $row['name']; // Lưu cột 'name' vào session

            // Chuyển hướng người dùng đến trang quản trị
            header("Location: quantri.php");
            exit();
        } else {
            $error = "Tài khoản không tồn tại hoặc bạn không có quyền truy cập";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
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
    <?php if (!isset($_SESSION['username'])): ?>
    <form method="post" id="loginForm">
        <?php if ($error): ?>
            <div class="error-message" style="text-align: center; margin-bottom: 10px; color: red; font-size: 16px">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <div id="form-login">
            <h2>Đăng nhập hệ thống quản trị</h2>
            <ul>
                <li class="input-container">
                    <label>Tài khoản</label>
                    <input type="text" 
                           name="username" 
                           id="username" 
                           placeholder="Tài khoản đăng nhập"
                           value="<?php echo htmlspecialchars($username); ?>"
                           class="<?php echo (isset($focus_field) && $focus_field == 'username') ? 'error-field' : ''; ?>">
                    <?php if (isset($focus_field) && $focus_field == 'username'): ?>
                        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                </li>
                <li class="input-container">
                    <label>Mật khẩu</label>
                    <input type="password" 
                           name="mk" 
                           id="mk" 
                           placeholder="Mật khẩu"
                           value="<?php echo htmlspecialchars($mk); ?>"
                           class="<?php echo (isset($focus_field) && $focus_field == 'mk') ? 'error-field' : ''; ?>">
                    <?php if (isset($focus_field) && $focus_field == 'mk'): ?>
                        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
                    <?php endif; ?>
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
    <?php else: ?>
        <script>
            window.location.href = 'quantri.php';
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($focus_field)): ?>
                var field = document.getElementById('<?php echo $focus_field; ?>');
                field.focus();
                if (field.value.length) {
                    field.setSelectionRange(field.value.length, field.value.length);
                }
            <?php endif; ?>
        })
    </script>
</body>
</html>
