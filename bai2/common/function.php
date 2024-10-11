<?php
// Chứa tất cả các hàm dùng chung trong hệ thống

// Hàm kết nối CSDL
function connectDB()
{
    $host       = DB_HOST;
    $dbname     = DB_NAME;

    // Kết nối đến CSDL
    try {
        // Tạo kết nối bằng PDO
        $conn = new PDO(
            "mysql:host=$host; dbname=$dbname",
            DB_USERNAME,
            DB_PASSWORD
        );

        // Thiết lập cơ chế lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cài đặt chế độ hiển thị dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
        // echo "Kết nối thành công";
    } catch (PDOException $e) {
        echo "Lỗi kết nối CSDL: " . $e->getMessage();
    }
    function UploadFile($file, $folderUpload){
    
        $pathStorage = $folderUpload . time() . $file['name'];
    
        $from = $file['tmp_name'];
        $to = PATH_ROOT . $pathStorage; 
    
        if(move_uploaded_file($from, $to)){
            return $pathStorage;
        }
        return null;
    }
    
    function deleteFile($pathStorage){
        $path = PATH_ROOT .$pathStorage;
        if(file_exists($path)){
            unlink($path);
        }
    }
    
}