<?php require_once 'config.php';?>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<form class="form-signin" method="POST" enctype="multipart/form-data">
            <h2 class="form-signin-heading">Upload File</h2>
            <div class="form-group">
            <label for="InputFile">File input</label>
            <input type="file" name="file" id="InputFile">
            <p class="help-block">Upload JPEG Files với dung lượng nhỏ hơn 100 KiloBytes</p>
            <!-- Thong bao loi  -->
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
 </form>

 <?php
    // gioi han file upload khong qua 100kb
    $max_size = 100000;
 
    // lay thong tin file upload
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type = $_FILES['file']['type'];
 
    if(isset($name) && !empty($name)){
 
    // lay duoi file
    $extension = substr($name, strpos($name, '.') + 1);
 
    // kiem tra xem co dung la file hinh anh hay khong
    if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){
        $location = "uploads/";
        if(move_uploaded_file($name, $location.$name)){
            $smsg = "Upload thành công !";
            // dua thong tin file vao csdl
            $query = "INSERT INTO `upload` (name, size, type, location) VALUES ('$name', '$size', '$type', '$location$name')";
            $result = mysql_query($query);
        }else{
            $fmsg = "Upload Thất bại";
        }
    }else{
        $fmsg = "Chỉ hỗ trợ file JPEG và dung lượng không quá 100 KiloBytes";
    }
 
    }else{
        $fmsg = "Chọn file upload";
    }
?>
</body>

