<?php 
session_start();
require_once "./common/env.php";
require_once "./common/function.php";
require_once "./controllers/nguoiDungcontrollers.php";
require_once './controllers/homeCotrollers.php';
require_once "./models/nguoiDung.php";

$act=$_GET['act'] ?? '/';
match($act){
    '/'=>(new HomeCotrollers)->index(),
    
    'danh-sach-ng-dung' =>(new NDcontroller())->danhSachNguoiDung(),
    'from-them-ng-dung'=>(new NDcontroller)->add(),
    'themNgDung' =>(new NDcontroller())->themNgDung(),
    'edit'=>(new NDcontroller())->edit($_GET['id']),
    'updateNGDUng'=>(new NDcontroller())->update(),
    'delete-ng-dung'=>(new NDcontroller())->deletangdung(),
}
?>