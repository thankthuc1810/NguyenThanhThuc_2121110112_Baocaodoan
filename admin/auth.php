<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nguyenthanhthuc_2121110112";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['LOGIN'])) {
    $loginCredential = $_POST['email']; 
    $password = $_POST['password'];


    $query = "SELECT * FROM `0112_user` WHERE `email` = '$loginCredential' OR `username` = '$loginCredential'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            if ($user['roles'] == 1) {

            } else {
                echo "Bạn không có quyền truy cập trang quản trị. Roles: " . $user['roles'];
            }
            {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                $_SESSION['loginadmin'] = true;

                header("location: index.php");
                exit;
            } 
        } else {

            echo "Mật khẩu không đúng";
        }
    } else {

        echo "Người dùng không tồn tại";
    }
}
