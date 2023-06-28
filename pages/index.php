<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HTML Form</title>
  </head>
  <body>
    <h1>Form</h1>
    <form method="POST" action="index.php" enctype="multipart/form-data" >
      <label  class="form-label">Name</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="name" required > <br><br>
      file : <input type="file" name="file"><br><br>
      <br/>
      <input type="submit" value="submit"  name="submit">
    </form>
  </body>
</html>

<?php
include "db/database.php";
if(isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    //the directory to upload to
    $targetDir = "uploads/";
    //the file being upload
    $targetFile = $targetDir.basename($_FILES['file']['name']);
    //select the file type - file extension
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
 //valid file extensions we will allow
$extensions_arr= array("pdf","doc","docx");
//checking the extension of our uploaded file
if(in_array($fileType,$extensions_arr)){
   // Insert record
   $query = " INSERT into `intern` (`name`) values('$name')";
   mysqli_query($con,$query);
   // Upload file
   move_uploaded_file($_FILES['file']['tmp_name'],$targetDir.$name);
} else echo " file not pdf or doc ";
}
?>