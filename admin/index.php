<?php
require_once "../vendor/autoload.php";

session_start();

if (!isset($_SESSION['loginadmin'])) {
    header("Location: login.php");
}


Route::route_admin();
