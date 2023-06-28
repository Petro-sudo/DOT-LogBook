<!DOCTYPE html>
<html>
<head>
  <title>Store form data in .txt file</title>
</head>
<body>
  <form method="post">
    Enter Your Text Here:<br>
    <textarea type="text" name="textdata"></textarea><br>
    <input type="submit" name="submit">
    
  </form>

</body>
</html>


<?php
              
if(isset($_POST['textdata']))
{
$data=$_POST['textdata'];

$fp = fopen('files/data.txt', 'a');

fwrite($fp, $data);
fclose($fp);
}
?><div class="open_grepper_editor" title="Edit & Save To Grepper"></div>

msg popuo echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";