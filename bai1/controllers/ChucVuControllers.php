<?php
class ChucVuController
{
    public $modelChucVu;

    public function __construct()
    {
        $this->modelChucVu=new chucVu();
    }
    public function index()
    {
        // Lấy ra dữ liệu từ CSDL
        $listChucVu = $this->modelChucVu->chucvuAll();
        // var_dump($lisChucVu);

        // Muốn đổ dữ liệu ra view thì sẽ require file view đó vào đây
        require_once './views/list.php';
    }

    public function add()
    {
        require_once './views/add.php'; // Giao diện form add
    }
    public function themnhanvien()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra tất cả các dữ liệu
            $ten_chuc_vu     = $_POST['ten_chuc_vu'];
           

            // Kiểm tra dữ liệu
            $error = [];

            // Kiểm tra trường name
            if (empty($ten_chuc_vu)) { // empty là hàm check trống. Nếu không có dữ liệu sẽ trả về TRUE
                $error['ten_chuc_vu'] = "Nhập đầy đủ họ tên";
            }

            if (empty($error)) {
                // Nếu ko có lỗi thì tiến hành thêm dữ liệu
                unset($_SESSION['error']); // Xóa các lỗi lưu trên session
                $this->modelChucVu->postData($ten_chuc_vu);
                header("Location: ?act=list");
                exit();
            } else {
                $_SESSION['error'] = $error;
                header("Location: ?act=-form-add-nhanvien");
                exit();
            }
        }
    }

    public function update($id){;
        $update=$this->modelChucVu->laydulieu($id);
        require_once './views/update.php'; 
    }

    public function updateNhanVien()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $ten_chuc_vu = trim($_POST['ten_chuc_vu']);
            $error = [];
    
            // Validate job title
            if (empty($ten_chuc_vu)) {
                $error['ten_chuc_vu'] = "Nhập đầy đủ chức vụ";
            }
    
            // If no errors, proceed with update
            if (empty($error)) {
                unset($_SESSION['error']); // Clear error session
                $this->modelChucVu->updatechucvu($id, $ten_chuc_vu);
                header("Location: ?act=list");
                exit();
            } else {
                $_SESSION['error'] = $error;
                header("Location: ?act=edit-nhan-vien&id=" . $id); // Ensure ID is passed to edit page
                exit();
            }
        }
    }
    
    public function deleteChucVu(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];


            if ($this->modelChucVu->deleteChucVu($id)) {
                header("Location: ?act=list");
                exit();
            }
        }
       
}
    

}
?>