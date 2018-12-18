<?php require_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tạo chức năng upload file với PHP và MySQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  function DeleteFile(id) {
    if (confirm("Are you sure?")) {
        // your deletion code
        window.location.href='delete.php?id='+id;
    }
    return false;
  }
</script>
</head>
<body>
 
<?php 
  $sql = "SELECT * FROM `upload`";
  $result = mysql_query($sql);
?>
 
<div class="container">
     
  <table class="table">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Size</th>
        <th>Type</th>
        <th>Location</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
         while($r = mysql_fetch_array($result)){
      ?>
      <tr>
        <td scope="row"><?php echo $r['id'] ?></td>
        <td><?php echo $r['name'] ?></td>
        <td><?php echo $r['size'] ?></td>
        <td><?php echo $r['type'] ?></td>
        <td><a href="<?php echo $r['location'] ?>">Download</a></td>
        <td><a href="#" onclick='DeleteFile(<?php echo $r['id'] ?>)'>Delete</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
  <div style="text-align:center"><a href="index.php"><< Quay Lại Trang Upload</a></div>
</div>
 
</body>
</html>