<?php include('kiemtra.php'); ?>

<table width="300" border="1" align="centre" cellpaddibg ="0" cellspacing="1" bgcolor="red">
<tr>
<form name="form1" method="post" action ="">
    <td>
    <table width="100%" border="1" cellpaddibg="3" cellspacing="1" bgcolor="red">
    <tr>
    <td colspan="3"><strong>Đăng nhập</strong></td>
    </tr>
    <tr>
    <td width="80">Tài khoản</td>
    <td width="10">:</td>
    <td width="300"><input name="myusername" type="text" id="myusername"></td>
    </tr>
    <tr>
    <td>Mật khẩu</td>
    <td>:</td>
    <td><input name="mypassword" type="text" id="mypassword"></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Đăng nhập"></td>
    </tr>
    </table>
    </td>
</form>
</tr>
</table>


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
      header('Location: http://localhost/login/hethong.php');
}
else{
    echo("Sai tên đăng nhập hoặc mật khẩu");
}
}

?>



<form id="themsach" action="hienthidulieu.php" method="POST">
                <table with="400" cellspacing="0" cellpadding="5" align="centre">
                    <tr>
                            <input type="text" id="ID_TheLoai" value="">
                    </tr>

                        <td><input type="submit" name="submit" value="Chọn"></td>                   
                    </tr>
                </table>
            </form>
        </div>