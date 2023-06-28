<?php
if(isset($_GET["mentorId"])){
    $mentorId = $_GET["mentorId"];
    include "db/database.php";
    
    $query = "DELETE FROM mentor WHERE mentorId=$mentorId";
    
    $mentor_user = mysqli_query($con, $query);
 
    if (!$mentor_user) {
        die("Query Failed".mysqli_error($con));
    }
    else{
        header("location: admin-mentor.php");
        exit();
       
}        
} 

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Log book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="header">
        <div class="header-left">
            <img src="image/dotleft.jpg" alt="Cinque Terre" width="170" height="110">
        </div>
        <div class="header-right">
            <img src="image/ndpright.png" alt="Cinque Terre" width="120" height="120">
        </div>
    </div>
    <h1>
        //<?php echo date("Y"); ?> MENTORS’
    </h1>
</head>
<body class="body">
    <container class="container">
    <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                        <div class="alert alert-danger">

                            <p>Are you sure you want to delete this employee record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="admin-mentor.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

    </container>
</body>
<div class="header">
    <div class="header-left">
        <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
    </div>
</div>
</html> -->
