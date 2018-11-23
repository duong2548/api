<!--Nguyễn Ngọc Hải-->
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
$sql="SELECT * FROM 'chitietdonhang'";
$result=mysqli_query($conn, $sql);
if ($result) {
    while ($row=mysqli_fetch_row($result)) {
        echo ("Ma_donhang: %s ,Ma_dathang: %s, Ma_sach: %s,Ma_tacgia :%s,
	    	So_luong :%s, Don_gia: %s<br>",$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
	    //  printf ("Id: %s, Title: %s, Content: %s<br>",$row[0],$row[1], $row[2]);
	}
    mysqli_free_result($result);
}
?>