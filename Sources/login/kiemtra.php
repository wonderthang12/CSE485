<?php

$host="localhost";
$username="root";
$password="";
$db_name="Dangnhap";
$tbl_name="members";

$conn=mysqli_connect("$host","$username","$password") or die("Không thể kết nối");
mysqli_select_db($conn,$db_name) or die("Không thể chọn DB");
if(isset($_POST['submit'])) {
    
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];

$myusername=stripslashes($myusername);
$mypassword=stripslashes($mypassword);
$myusername=mysql_real_escape_string($myusername);
$mypassword=mysql_real_escape_string($mypassword);
$sql="SELECT * from $tbl_name where username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if($result->num_rows !=0){
      header('Location: http://localhost/docsach/login/hethong.php');
}
else{
    echo("Sai tên đăng nhập hoặc mật khẩu");
}
}

?>