<?php

use App\Models\User;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nguyenthanhthuc_2121110112";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "Tài khoản không hợp lệ !"; 

if (isset($_POST['LOGIN'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `0112_user` WHERE `email` = '$username' OR `username` = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();



        if (password_verify($password, $user['password'])) {
            if ($user['roles'] == 1) {
               $_SESSION['iscustom'] = $user['name'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['loginadmin'] = true;

                header("location:index.php");
                exit;
            } else {
                $error = "Bạn không có quyền truy cập trang quản trị. Roles: " . $user['roles'];
            }
        } else {
            $error = "Mật khẩu không đúng";
        }
    } else {
        $error = "Người dùng không tồn tại";
    }
}

?>

<?php require_once "views/frontend/header.php"; ?>
<section class="bg-light">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
                <li class="breadcrumb-item">
                    <a class="text-main" href="index.html">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Đăng nhập
                </li>
            </ol>
        </nav>
    </div>
</section>
<section class="hdl-maincontent py-2">
    <form action="index.php?option=customer&login=true" method="post" name="logincustomer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Để gửi bình luận, liên hệ hay để mua hàng cần phải có tài khoản</p>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="username" class="text-main">Tên tài khoản (*)</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-main">Mật khẩu (*)</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-main" name="LOGIN">Đăng nhập</button>
                    </div>
                    <p><u class="text-main">Chú ý</u>: (*) Thông tin bắt buộc phải nhập</p>
                    <?php echo $error ?? "" ; ?>
                </div>
            </div>
        </div>
    </form>
</section>
<?php require_once "views/frontend/footer.php"; ?>
