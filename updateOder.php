<!--Giáp Minh Hoàng-->
<?php
function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_bansachonline";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        return null;
    }
    return $conn;
}
function update(){

    $query = "UPDATE
                " . $this->table_name . "
            SET
                Ma_sach= :Ma_sach,
                Ma_tacgia= :Ma_tacgia,
                So_luong = :So_luong,
                Don_gia = :Don_gia
            WHERE
                Ma_donhang= :Ma_donhang";


    $stmt = $this->conn->prepare($query);


    $this->masach=htmlspecialchars(strip_tags($this->masach));
    $this->matacgia=htmlspecialchars(strip_tags($this->matacgia));
    $this->soluong=htmlspecialchars(strip_tags($this->soluong));
    $this->don_gia=htmlspecialchars(strip_tags($this->don_gia));
    $this->madonhang=htmlspecialchars(strip_tags($this->madonhang));


    $stmt->bindParam(':Ma_sach',  $this->masach);
    $stmt->bindParam(':Ma_tacgia',  $this->matacgia);
    $stmt->bindParam(': So_luong', $this->soluong);
    $stmt->bindParam(': Don_gia', $this->don_gia);
    $stmt->bindParam(':Ma_donhang',  $this->madonhang);


    if($stmt->execute()){
        return true;
    }

    return false;
}
?>