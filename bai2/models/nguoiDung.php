<?php 
class ND{
    public $conn;
    public function __construct(){
        $this->conn=connectDB();
    }
    public function LayDuLieu(){
        try {
            $sql = "SELECT * FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function themUSE($img,$ho_ten,$email,$ngay_sinh,$so_dien_thoai,$dia_chi,$gioi_tinh,$mat_khau,$chuc_vu_id,$trang_thai){
        try{
         $sql="INSERT INTO nguoi_dungs (anh_dai_dien,ho_ten,email,ngay_sinh,so_dien_thoai,dia_chi,gioi_tinh,mat_khau,chuc_vu_id,trang_thai)
         VALUES (:anh_dai_dien,:ho_ten,:email,:ngay_sinh,:so_dien_thoai,:dia_chi,:gioi_tinh,:mat_khau,:chuc_vu_id,:trang_thai)";
         
         $stmt=$this->conn->prepare($sql);
         // var_dump($stmt);die();
         $stmt->bindParam(':anh_dai_dien',$img);
         $stmt->bindParam(':ho_ten',$ho_ten);
         $stmt->bindParam(':email',$email);
         $stmt->bindParam(':ngay_sinh',$ngay_sinh);
         $stmt->bindParam(':so_dien_thoai',$so_dien_thoai);
         $stmt->bindParam(':dia_chi',$dia_chi);
         $stmt->bindParam(':gioi_tinh',$gioi_tinh);
         $stmt->bindParam(':mat_khau',$mat_khau);
         $stmt->bindParam(':chuc_vu_id',$chuc_vu_id);
         $stmt->bindParam(':trang_thai',$trang_thai);
         $stmt->execute();
         return true;
        }catch (PDOException $e) {
         echo $e->getMessage();
      }    
    }
    public function layThongTin($id){
        try{
            $sql_update="SELECT * FROM nguoi_dungs WHERE id=:id";
            $stmt=$this->conn->prepare($sql_update);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
          return $stmt->fetch();

        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateNGDUng($id, $img, $ho_ten, $email, $ngay_sinh ,$so_dien_thoai, $dia_chi, $gioi_tinh, $mat_khau, $chuc_vu_id, $trang_thai){
        try{
            $sql = "UPDATE nguoi_dungs 
            SET anh_dai_dien=:anh_dai_dien, 
                ho_ten=:ho_ten, 
                email=:email, 
                ngay_sinh=:ngay_sinh, 
                so_dien_thoai=:so_dien_thoai, 
                dia_chi=:dia_chi, 
                gioi_tinh=:gioi_tinh, 
                mat_khau=:mat_khau, 
                chuc_vu_id=:chuc_vu_id, 
                trang_thai=:trang_thai 
            WHERE id=:id";
         
         $stmt=$this->conn->prepare($sql);
         // var_dump($stmt);die();
         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':anh_dai_dien', $img);
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ngay_sinh', $ngay_sinh);
        $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':gioi_tinh', $gioi_tinh);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);
        $stmt->bindParam(':trang_thai', $trang_thai);
        
         $stmt->execute();
         return true;
        }catch (PDOException $e) {
         echo $e->getMessage();
     }
         
     }

     public function deleteNguoiDung($id){
        try {
            $sql = "DELETE  FROM nguoi_dungs WHERE id = :id";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }




    
}