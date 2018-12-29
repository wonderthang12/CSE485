<?php
$host="localhost";
$username="root";
$password="";
$db_name="data_truyen";

$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn cơ sở dữ liệu");

mysqli_set_charset($conn,"utf8");

$ID_TheLoai= $_POST['ID_TheLoai'];
$Ten_TheLoai = $_POST['Ten_TheLoai'];

$sql = "INSERT INTO `theloai` (ID_TheLoai,Ten_TheLoai) 
        VALUES ('$ID_TheLoai','$Ten_TheLoai')";

if(isset($_POST['submit'])){
if ($conn->query($sql) === TRUE) {
    echo "Thêm dữ liệu thành công";
    $sql1="SELECT * from theloai";
    $result = mysqli_query($conn,$sql1);
    while($row =mysqli_fetch_array($result)){
    echo "<br>";
    echo "ADMIN ĐÃ THÊM";
    echo "<br>";
    echo "ID thể loại: ";
    echo $row["ID_TheLoai"];
    echo "<br>";
    echo "Tên thể loại: ";
    echo $row["Ten_TheLoai"];
}
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
