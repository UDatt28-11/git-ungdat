<?php
session_start();
require_once "./common/env.php";    // Chứa các biến môi trường
require_once "./common/function.php"; 
require_once "./controllers/danhMuccontrollers.php";
require_once "./models/danhMuc.php";

$act=$_GET['act'] ?? '/';
match($act){
    '/'=>(new DanhMucController)->index(),
    'list'=>(new DanhMucController)->index(),
    'form-add'=>(new DanhMucController)->add(),
    'them-nhan-vien'=>(new DanhMucController)->themnhanvien(),
    'edit-nhan-vien'=> (new DanhMucController)->update($_GET['id']),
    'update-nhan-vien'=> (new DanhMucController)->updateNhanVien(),
    'delete-chuc-vu'=>(new DanhMucController)->deleteChucVu(),
}  ; 


?>