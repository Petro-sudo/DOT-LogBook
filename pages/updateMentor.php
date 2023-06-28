<?php
include "db/database.php";

if (isset($_GET['mentorId'])) {
    $mentorId = $_GET['mentorId'];
}
$query = "SELECT * FROM mentor WHERE mentorId = $mentorId ";
$view_users = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($view_users)) {
    $mentorId = $row['mentorId'];
    $name = $row['name'];
    $surname = $row['surname'];
    $perselNo = $row['perselNo'];
    $email = $row['email'];
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    // SQL query to update the data in user table where the id = $userid 
    $query = "UPDATE mentor SET name = '{$name}' , surname = '{$surname}' WHERE mentorId = $mentorId";
    $update_user = mysqli_query($con, $query);

    if (!$update_user) {
        die("Query Failed" . mysqli_error($con));
    } else {
        header("location: admin-mentor.php");
        // exit();
    }
}


?>
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
    <h1>UPDATE
        <?php echo date("Y"); ?> MENTORS Info

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
<br><br>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="perselNo">Enter Surname</label>
                        <input type="text" name="surname" class="form-control" value="<?php echo $surname ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="name"> Persel Number</label>
                        <br>
                        <label>
                            <?php echo $perselNo ?>
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <br>
                        <label>
                            <?php echo $email ?>
                        </label>
                    </div>
                    <br>
                    <div>
                        <div class="header-left">
                            <input type="submit" name="update" class="btn btn-primary mt-2" value="update">
                        </div>
                        <div class="header-right">
                            <a href="admin-mentor.php" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
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