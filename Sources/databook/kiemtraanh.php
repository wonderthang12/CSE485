<?php   
$conn = mysql_connect("localhost", "root", "");  
   
//chọn database làm việc  
mysql_select_db("storeimg", $conn);  
   
//tên file ảnh  
$imgFilename = "storeimg.jpg";  
   
//mở file ảnh để đọc với chế độ đọc binary  
$fh = fopen($imgFilename, "rb");  
$imgData = fread($fh, filesize($imgFilename));  
fclose($fh);  
   

$sql = "INSERT INTO tblImage (imgData) VALUES('" . mysql_real_escape_string($imgData, $conn) . "')";  
mysql_query($sql, $conn);  
?>  

<?php   
$conn = mysql_connect("localhost", "root", "");  
   
//chọn database làm việc  
mysql_select_db("storeimg", $conn);  
   
//ID của file ảnh  
$imgID = 1;  
   
//đọc nội dung file ảnh từ table tblImage  
$sql = "SELECT * FROM tblImage WHERE imgID=" . $imgID;  
$result = mysql_query($sql, $conn);  
if
 ( mysql_num_rows($result) < 1 ) {  
    //không tìm thấy image với ID chỉ định  
    //thông báo lỗi nếu cần thiết 
    echo "Không tìm thấy file ảnh"; 
} 
else
 {  
    $row = mysql_fetch_assoc($result);  
    $imgData = $row['imgData'];  
} //end if  
?> 

<?php  
    //...  
    $row = mysql_fetch_assoc($result);  
    $imgData = $row['imgData'];  
    header("Content-type: image/jpeg");  
   
    echo $imgData;  
    //...  
?>  