<!--Đỗ Thùy Dương-->
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

// Đoạn này lấy dữ liệu thô từ client gửi lên
$raw = file_get_contents('php://input');

// Parse json thành object
$jsonObj = json_decode($raw, true);

// Lấy đối tượng connect database
$conn = connectDB();

// Check nếu nó ok thì mới xử lý tiếp
if ($conn) {
    // Lấy các trường cần thiết từ json object
    $id_khach_hang = $jsonObj['id_khach_hang'];
    $trigia = $jsonObj['trigia'];
    $trangthai = $jsonObj['trangthai'];
    $ngaydathang = $jsonObj['ngaydathang'];
    $ngaygiaohang = $jsonObj['ngaygiaohang'];
    $ngaydathang = strtotime($ngaydathang);
    $ngaygiaohang = strtotime($ngaygiaohang);

    $sql = "INSERT INTO dat_hang (id_khach_hang, ngaydathang, trigia, trangthai, ngaygiaohang)
            VALUES (".$id_khach_hang.",FROM_UNIXTIME(".$ngaydathang."),".$trigia.",".$trangthai.",FROM_UNIXTIME(".$ngaygiaohang."))";
    if ($conn->query($sql) === TRUE) {
        echo "Import success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>