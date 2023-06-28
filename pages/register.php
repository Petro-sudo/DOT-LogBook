<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <div class="header">
    <div class="header-left">
      <img src="image/dotleft.jpg" alt="Cinque Terre" width="170" height="110">
    </div>
    <div class="header-right">
      <img src="image/ndpright.png" alt="Cinque Terre" width="120" height="120">
    </div>
  </div>
  <h1>INTERNS’ MENTORS REPORTING SYSTEM</h1>
</head>

<?php
include "db/database.php";

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $perselNo = $_POST['perselNo'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $pwd = $_POST['pwd'];
  $cpwd = $_POST['cpwd'];
  $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
  $uppercasePassword = "/(?=.*?[A-Z])/";
  $lowercasePassword = "/(?=.*?[a-z])/";
  $digitPassword = "/(?=.*?[0-9])/";
  $spacesPassword = "/^$|\s+/";
  $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
  $minEightPassword = "/.{8,}/";

  if ($name == "" || $surname == "" || $perselNo == "" || $email == "" || $role == "" || $pwd == "" || $cpwd == "") {

    echo '<i style="color:red;">ALL FIELDS MANDATORY </i>';

  } elseif (!preg_match('/^[0-9]{8}+$/', $perselNo)) {
    echo '<i style="color:red;">Persal Number must contain 8 numbers</i>';
  } elseif (!preg_match($validEmail, $email)) {
    echo '<i style="color:red;">Invalid Email Address</i>';
  } elseif (!preg_match($uppercasePassword, $pwd) || !preg_match($lowercasePassword, $pwd) || !preg_match($digitPassword, $pwd) || !preg_match($symbolPassword, $pwd) || !preg_match($minEightPassword, $pwd) || preg_match($spacesPassword, $pwd)) {
    echo " *Password must be at least one uppercase letter";
    echo " *Lowercase letter";
    echo " *Digit, a special character with no spaces";
    echo " *Minimum 8 of length";
  } elseif ($cpwd != $pwd) {
    echo '<i style="color:red;">Confirm Password doest Matched</i>';
  } else {
    $select = mysqli_query($con, "SELECT `email` FROM `register` WHERE `email` = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($select)) {
      echo '<i style="color:red;">This email is already being used</i>';
    }
    $query = "INSERT INTO register(name, surname,  perselNo, email, pwd, role) VALUES('$name', '$surname', '$perselNo', '$email',  '$pwd', '$role') ";

    $register_user = mysqli_query($con, $query);

    if (!$register_user) {
      die("Query Failed" . mysqli_error($con));
    }
  }
}
?>

<body class="body">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">


        <h2>Sign Up</h2>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name</label><br>
            <input type="text" class="form-control" id="name" placeholder="Enter Username" name="name">
          </div>
          <br>
          <div class="form-group">
            <label for="surname">Surname</label><br>
            <input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname">
          </div>
          <br>
          <!-- <div class="form-group">
            <label for="email">ID Number</label><br>
            <input type="text" class="form-control" id="id_number" placeholder="Enter ID Number" name="id_number">
          </div> -->
          <br>
          <div class="form-group">
            <label for="perselNo">Persel Number</label><br>
            <input type="text" class="form-control" id="perselNo" placeholder="Mentor Persel Number" name="perselNo">
          </div>
          <br>
          <div class="form-group">
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" id="email" placeholder="Enter email Address" name="email">
          </div>
          <small id="emailHelp" class="form-text text-muted">Do not share your email with anyone
                            else.</small>
          <br>
          <div class="form-group">
            <label for="role">Role:</label><br>
            <select class="form-control" name="role">
              <option value="">Select Role</option>
              <option value="Intern">Intern</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <br>
          <div class="form-group">
            <label for="pwd">Password</label><br>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
          <br>
          <div class="form-group">
            <label for="cpwd">Confirm Password</label><br>
            <input type="password" class="form-control" id="cpwd" placeholder="Enter same password" name="cpwd">
          </div>
          <br>
          <div class="form-group">
            <p>Already have account ?<a href="login.php"> Sign In</a></p>
            <button type="submit" class="btn btn-primary" name="register"
              style="margin-left: 45%; margin-top: 20px;">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<div class="header">
  <div class="header-left">
    <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
  </div>
</div>

</html>