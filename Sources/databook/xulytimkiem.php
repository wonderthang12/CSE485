<?php 
require_once 'formsearch.html';

$host="localhost";
$username="root";
$password="";
$db_name="data_truyen";


$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn cơ sở dữ liệu");

if(isset($_POST['submit'])){
$sql="SELECT noidung.ID_Truyen, TacGia, Chuong, NoiDung from noidung inner join timkiem on noidung.ID_Truyen = timkiem.ID_Truyen";
mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn,$sql);

while($row =mysqli_fetch_array($result)){
        echo "<br>";
        echo "ID truyện: ";
        echo $row["ID_Truyen"];
        echo "<br>";
        echo "Tác giả: \n";
        echo $row["TacGia"];
        echo "<br>";
        echo "Chương: \n";
        echo $row["Chuong"];
        echo "<br>";
        echo "Nội dung: \n";
        echo $row["NoiDung"];
}}
?>