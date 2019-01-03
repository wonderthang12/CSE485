<?php
$host="localhost";
$username="root";
$password="";
$db_name="data_truyen";
$tbl_name="theloai";

$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn cơ sở dữ liệu");

mysqli_set_charset($conn,"utf8");

$ID_TheLoai = $_POST['ID_TheLoai'];
$Ten_TheLoai = $_POST['Ten_TheLoai'];

$sql = "DELETE FROM theloai where ID_TheLoai='$ID_TheLoai' and Ten_TheLoai = '$Ten_TheLoai'";

if ($conn->query($sql) === TRUE) {
    echo "Xóa thành công";
} else {
    echo "Xóa thất bại: " . $conn->error;
}

$conn->close();
?>