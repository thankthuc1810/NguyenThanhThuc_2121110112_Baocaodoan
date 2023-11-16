<?php

use App\Libraries\Mystring;
use App\Models\User;

if (isset($_POST['REGISTER'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $roles = $_POST['roles'];
    $status = $_POST['status'];

    $user = new User;
    $user->name = $name;
    $user->username = $username;
    $user->password = $password;
    $user->email = $email;
    $user->phone = $phone;
    $user->gender = $gender;
    $user->address = $address;
    $user->roles = 0;
    $user->status = 1;
    $user->created_at = date('Y-m-d H:i:s');
    $user->image = 'hong co anh';

    $user->save();

    Mystring::set_flash('message', ['type' => 'success', 'msg' => 'Đăng ký và đăng nhập thành công']);
    header('location: index.php?option=login');
    exit;
}
?>

<?php require_once "views/frontend/header.php"; ?>
<section class="hdl-maincontent py-2">

    <form action="index.php?option=process" method="post" name="registercustomer">
        <div class="container">
            <h1 class="fs-2 text-main text-center">ĐĂNG KÝ TÀI KHOẢN</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="text-main">Họ tên(*)</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="text-main">Điện thoại(*)</label>
                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="text-main">Địa chỉ(*)</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Vui lòng nhập địa chỉ cụ thể" required>
                    </div>
                    <div class="mb-3">
                        <label class="text-main" for="gender">Giới tính</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="username" class="text-main">Tên tài khoản(*)</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản đăng nhập" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-main">Email(*)</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="text-main">Mật khẩu(*)</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                        <input type="password" name="password_re" id="password_re" class="form-control" placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-main" name="REGISTER">Đăng ký</button>
                     </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php require_once "views/frontend/footer.php"; ?>