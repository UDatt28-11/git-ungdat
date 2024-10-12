<?php 
class NDcontroller{
    public $modelnguoiDung;
    public function __construct(){
        $this->modelnguoiDung = new ND();
    }
    public function danhSachNguoiDung(){
        $nguoiDung = $this->modelnguoiDung->LayDuLieu();
        require_once './view/list.php';
    }
    
    public function add(){
        require_once './view/add.php';
    }
    public function themNgDung(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if ($_FILES['anh_dai_dien']) { //kiểm tra có file upload lên không?
                $file = $_FILES['anh_dai_dien'];
                $img = $file['name'];
                $from = $file['tmp_name']; //đường dẫn tạm thời
                $to = './uploads/'.$img;
                move_uploaded_file($from, $to);
            } else {
                $img = null;
            }
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $mat_khau = $_POST['mat_khau'];
            $chuc_vu = $_POST['chuc_vu'];
            $trang_thai = $_POST['trang_thai'];

            $error = [];
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Nhập đầy đủ họ tên";
            }

            if (empty($email)) {
                $error['email'] = "Nhập đầy đủ email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email sai định dạng";
            }

            $ngayHienTai = date('Y-m-d'); // Định dạng YYYY-MM-DD cho ngày hiện tại

            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Nhập đầy đủ ngày sinh";
            } else {
                // Chuyển ngày sinh và ngày hiện tại thành timestamp để so sánh
                $ngay_sinh_timestamp = strtotime($ngay_sinh);
                $ngay_hien_tai_timestamp = strtotime($ngayHienTai);
                
                if ($ngay_sinh_timestamp > $ngay_hien_tai_timestamp) {
                    $error['ngay_sinh'] = "Ngày sinh không được lớn hơn ngày hiện tại";
                }
            }

            if (empty($dia_chi)) {
                $error['dia_chi'] = "Nhập đầy đủ địa chỉ";
            }

            $regex = '/(84|0[3|5|7|8|9])+([0-9]{8})\b/';
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Nhập đầy đủ số điện thoại";
            } elseif (!preg_match($regex, $so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại sai định dạng";
            }

            if (empty($mat_khau)) {
                $error['mat_khau'] = "Mật khẩu không được để trống";
            } elseif (strlen($mat_khau) < 8) {
                $error['mat_khau'] = "Mật khẩu phải có ít nhất 8 ký tự";
            }

            if (empty($chuc_vu)) {
                $error['chuc_vu'] = "Chức vụ không được bỏ trống";
            }

            if (empty($trang_thai)) {
                $error['trang_thai'] = "Trạng thái không được bỏ trống";
            }
        
            if (empty($error)) {
                unset($_SESSION['error']);
                $this->modelnguoiDung->themUSE(
                        $img,
                    $ho_ten, 
                    $email, 
                    $ngay_sinh, 
                    $so_dien_thoai, 
                    $dia_chi, 
                    $gioi_tinh, 
                    $mat_khau, 
                    $chuc_vu, 
                    $trang_thai
                );
                header("Location: ?act=danh-sach-ng-dung");
                exit();
            } else {
                $_SESSION['error'] = $error;
                header("Location: ?act=from-them-ng-dung");
                exit();
            }
        }
    }
    public function edit($id){
        $update=$this->modelnguoiDung->layThongTin($id);
        // var_dump($update);die();
        require_once './view/update.php';
    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id=$_POST['id'];
            $img = $_FILES['anh_dai_dien'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $mat_khau = $_POST['mat_khau'];
            $chuc_vu = $_POST['chuc_vu'];
            $trang_thai = $_POST['trang_thai'];
          

            $error = [];
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Nhập đầy đủ họ tên";
            }

            if (empty($email)) {
                $error['email'] = "Nhập đầy đủ email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email sai định dạng";
            }

            $ngayHienTai = date('Y-m-d');

            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Nhập đầy đủ ngày sinh";
            } else {
                // Chuyển ngày sinh và ngày hiện tại thành timestamp để so sánh
                $ngay_sinh_timestamp = strtotime($ngay_sinh);
                $ngay_hien_tai_timestamp = strtotime($ngayHienTai);
                
                if ($ngay_sinh_timestamp > $ngay_hien_tai_timestamp) {
                    $error['ngay_sinh'] = "Ngày sinh không được lớn hơn ngày hiện tại";
                }
            }

            if (empty($dia_chi)) {
                $error['dia_chi'] = "Nhập đầy đủ địa chỉ";
            }

            $regex = '/(84|0[3|5|7|8|9])+([0-9]{8})\b/';
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Nhập đầy đủ số điện thoại";
            } elseif (!preg_match($regex, $so_dien_thoai)) {
                $error['so_dien_thoai'] = "Số điện thoại sai định dạng";
            }

            if (empty($mat_khau)) {
                $error['mat_khau'] = "Mật khẩu không được để trống";
            } elseif (strlen($mat_khau) < 8) {
                $error['mat_khau'] = "Mật khẩu phải có ít nhất 8 ký tự";
            }

            if (empty($chuc_vu)) {
                $error['chuc_vu'] = "Chức vụ không được bỏ trống";
            }

            if (empty($trang_thai)) {
                $error['trang_thai'] = "Trạng thái không được bỏ trống";
            }



            if (empty($error)) {
                unset($_SESSION['error']);
                $this->modelnguoiDung->updateNGDUng(
                    $id,
                        $img,
                    $ho_ten, 
                    $email, 
                    $ngay_sinh, 
                    $so_dien_thoai, 
                    $dia_chi, 
                    $gioi_tinh, 
                    $mat_khau, 
                    $chuc_vu, 
                    $trang_thai
                );
                header("Location: ?act=danh-sach-ng-dung");
                exit();
            } else {
                $_SESSION['error'] = $error;
                header("Location: ?act=from-them-ng-dung");
                exit();
            }
        }
    }

    public function deletangdung(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];


            if ($this->modelnguoiDung->deleteNguoiDung($id)) {
                header("Location: ?act=danh-sach-ng-dung");
                exit();
            }
        }
       
}



    
}