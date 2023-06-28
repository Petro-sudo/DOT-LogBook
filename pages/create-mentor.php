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
    <h1>CREATE MENTORS FOR
        <?php echo date("Y"); ?>
    </h1>
    <div>
        <div class="header-right">
            <a href="logout.php"> Log out</a>
        </div>
        <div class="header-left">
            <a href="dashboard.php"> Back</a>
        </div>
    </div>
</head>
<?php
include "db/database.php";

if (isset($_POST['mentor'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $perselNo = $_POST['perselNo'];
    $email = $_POST['email'];
    $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";

    if ($name == "" || $surname == "" || $perselNo == "" || $email == "") {

        echo '<i style="color:red;">*ALL FIELDS MANDATORY</i>';
    } elseif (!preg_match('/^[0-9]{8}+$/', $perselNo)) {
        echo '<i style="color:red;">Persal Number must contain 8 numbers</i> ';
    } elseif (!preg_match($validEmail, $email)) {
        echo '<i style="color:red;">Invalid Email Address</i>';
    } else {
        $select = mysqli_query($con, "SELECT `email` FROM `mentor` WHERE `email` = '" . $_POST['email'] . "'");
        if (mysqli_num_rows($select)) {
            echo '<i style="color:red;">This email is already being used</i>';
        }
        $query = "INSERT INTO mentor (name, surname,  perselNo, email) VALUES('$name', '$surname', '$perselNo', '$email') ";

        $mentor_user = mysqli_query($con, $query);
 
        if (!$mentor_user) {
            die("Query Failed" . mysqli_error($con));
        }
        else{
            header("location: admin-mentor.php");
            exit();
        }    
    }
}
?>
<br><br>
<body class="body">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Fill in the following</h2>
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
                    <div class="form-group">
                        <label for="perselNo">Persel Number</label><br>
                        <input type="text" class="form-control" id="perselNo" placeholder="Mentor Persel Number"
                            name="perselNo">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email Address</label><br>
                        <input type="text" class="form-control" id="email" placeholder="Enter email Address"
                            name="email">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="mentorid1" class="btn btn-primary" name="mentor"
                            style="margin-left: 45%; margin-top: 20px;">Create Mentor
                        </button>
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