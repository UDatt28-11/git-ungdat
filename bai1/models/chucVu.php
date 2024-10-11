<?php 
class ChucVu{
    public $conn;
    //Kết nối cơ sở dữ liệu 
    public function __construct(){
        $this->conn = connectDB();
    }
    //Lấy toàn bộ dũ liệu trong dtbs
    public function chucvuAll(){
        try{
            $sql = "SELECT * FROM chuc_vus";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    //Thêm dữ liệu người dùng 
    public function postData($ten_chuc_vu){
        try{
            $sql="INSERT INTO chuc_vus (ten_chuc_vu)
            VALUES (:ten_chuc_vu)";
            var_dump($sql);
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(':ten_chuc_vu',$ten_chuc_vu);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            echo $e->getMessage();
            return false;
    
        }
    }
    //Update
    public function laydulieu($id)
    {
        try {
            $sql_detail = "SELECT * FROM chuc_vus WHERE id = :id";

            $stmt = $this->conn->prepare($sql_detail);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

    public function updatechucvu($id, $ten_chuc_vu)
    {
        try {
            $sql = "UPDATE chuc_vus SET ten_chuc_vu = :ten_chuc_vu WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            // Binding the parameters
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Ensure ID is integer
            $stmt->bindParam(':ten_chuc_vu', $ten_chuc_vu);  // Ensure job title is string
            
            // Execute the statement
            $stmt->execute();
            
            // Check if any row was affected
            if ($stmt->rowCount() > 0) {
                return true; // Update successful
            } else {
                return false; // No rows affected
            }
    
        } catch (PDOException $e) {
            // Log error instead of echoing it in production
            error_log($e->getMessage(), 3, "/var/log/php_errors.log"); 
            return false;
        }
    }

    //Xóa dữ liệu người dùng 
    public function deletechucvu($id){
        try {
            $sql = "DELETE  FROM chuc_vus WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }


    public function __destruct()
    {
        $this->conn = null;
    }
}