<?php

$host="localhost";
$username="root";
$password="";
$db_name="data_truyen";
$tbl_name="noidung";

$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn cơ sở dữ liệu");

if(isset($_POST['submit'])){
$sql="SELECT * from $tbl_name";
mysqli_set_charset($conn, 'UTF8');
$result = mysqli_query($conn,$sql);
while($row =mysqli_fetch_array($result)){
    echo "ID truyện: \n";
    echo $row["ID_Truyen"];
    echo "Tác giả: \n";
    echo $row["TacGia"];
    echo "Chương: \n";
    echo $row["Chuong"];
    echo "Nội dung: \n";
    echo $row["NoiDung"];

}
}