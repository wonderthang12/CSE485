<?php // include("index.html"); ?>

<?php 

$host="localhost";
$username="root";
$password="";
$db_name="data_truyen";

$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn cơ sở dữ liệu");



if(isset($_POST['submit'])){
$sql="SELECT * from noidung where noidung.ID_Truyen = (select ID_Truyen from truyen where truyen.ID_Truyen = ID_Truyen and truyen.ID_TheLoai = ID_TheLoai) ";
mysqli_set_charset($conn,"utf8");
$result = mysqli_query($conn,$sql);

while($row =mysqli_fetch_array($result)){
    echo "ID truyện: ";
    echo $row["ID_Truyen"];
    echo "<br>";
    echo "Tên truyện: Nghêu sò ốc hến";
    echo "<br>";
    echo "Tác giả: ";
    echo $row["TacGia"];
    echo "<br>";
    echo "Chương: 1";
    echo "<br>";
    echo "Nội dung: ";
    echo $row["NoiDung"];
  
}}
?>