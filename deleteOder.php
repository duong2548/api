<!--Nguyễn Ngọc Hiếu-->
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "qlbansach";      // Khai báo database
// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $connect->connect_error);
    exit();
}
//Code xử lý, xóa record dữ liệu của table dựa theo điều kiện WHERE tại id = 1
$sql = "DELETE FROM donhang WHERE id=1";
//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if ($connect->query($sql) === TRUE) {
    echo "Dữ liệu đã được xóa";
} else {
    echo "Lỗi delete: " . $connect->error;
}
//Đóng kết nối database tintuc
$connect->close();
?>