<?php
session_start();
require_once "./common/env.php";    // Chứa các biến môi trường
require_once "./common/function.php"; 
require_once "./controllers/ChucVuControllers.php";
require_once "./models/chucVu.php";

$act=$_GET['act'] ?? '/';
match($act){
    '/'=>(new ChucVuController)->index(),
    'list'=>(new ChucVuController)->index(),
    'form-add-nhanvien'=>(new ChucVuController)->add(),
    'them-nhan-vien'=>(new ChucVuController)->themnhanvien(),
    'edit-nhan-vien'=> (new ChucVuController)->update($_GET['id']),
    'update-nhan-vien'=> (new ChucVuController)->updateNhanVien(),
    'delete-chuc-vu'=>(new ChucVuController)->deleteChucVu(),
}  ; 


?>