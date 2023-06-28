if($pass != $cpass)
                {
                    echo "<script> alert(' Please enter same password')</script>";
                }
else
{
echo "<script> alert(' Entered password are same')</script>";
}
// another method
if ($_POST["pass"] === $_POST["cpass"]) {
   echo "<script> alert(' Entered passwords are same') </script>";
else {
   echo "<script> alert(' Please enter same passwords ') </script>";
    
	<?php if ( $my_name == "someguy" ) { ?> 
    HTML GOES HERE 
<?php }

 <?php
 if ($condition) {
   echo <<< END_OF_TEXT
     <b>lots of html</b> <i>$variable</i>
     lots of text...
 many lines possible, with any indentation, until the closing delimiter...
 END_OF_TEXT;
 }
 ?>
 //MINE
 if($password != $cpassword)
?>

        
		
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $set_email;?>">
    <p class="err-msg"><?php if($emailErr!=1){ echo $emailErr; } ?></p>
</div>
		

<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter password" name="password">
    <p class="err-msg"><?php if($passErr!=1){ echo $passErr; } ?></p>
</div>
        <!--//Confirm Password//-->
<div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" placeholder="Enter Confirm password" name="cpassword">
    <p class="err-msg"><?php if($cpassErr!=1){ echo $cpassErr; } ?></p>
</div>

//date 
<td> <?php echo date('d-M-Y', strtotime($row['created'])) ?></td>