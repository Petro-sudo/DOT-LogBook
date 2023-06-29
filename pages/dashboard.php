<?php session_start();
// Include database connection file
include_once('db/database.php');
if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Log book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="header">
        <div class="header-left">
            <img src="image/dotleft.jpg" alt="Cinque Terre" width="170" height="110">
        </div>
        <div class="header-right">
            <img src="image/ndpright.png" alt="Cinque Terre" width="120" height="120">
        </div>
    </div>
    <h1>Hi
        <?php echo ucwords($_SESSION['NAME']);
        echo " ";
        echo ucwords($_SESSION['SURNAME']);
        echo " ";
        echo ucwords($_SESSION['ROLE']); ?>
    </h1>
    <div class="header-right">
        <a href="logout.php"> Log out</a>
    </div>
</head>
<br>

<body class="body">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!--  intern -->
                <?php if ($_SESSION['ROLE'] == 'Intern') { ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="table table-hover">

                            <p style="font-weight: bold;font-size: large;">-On this page you need to fill in all your
                                monthky tasks as followers:
                            <p style="font-weight: bold;font-size: large;">-Date:Monthly</p>
                            <p style="font-weight: bold;font-size: large;">-Hours Worked: Monthly</p>
                            <p style="font-weight: bold;font-size: large;">-On your Task Description field you need to fill
                                it as followers for example:</p>
                            <p style="font-weight: bold;font-size: large;">Date (Monday-Friday)</p>
                            <p> +05/June/2023 - 09/June/2023</p>
                            <p style="font-weight: bold;font-size: large;"> Task Given</p>
                            <p> + NLTS Training (RAS & NTS)</p>
                            <p style="font-weight: bold;font-size: large;">Task Description </p>
                            <p> + I attended a training where and I was taught
                                about Registration Administration System (RAS) and National Transport Route (NTR).
                                On RAS I have learned on how to create associations, association members, update their
                                status and their information using the NLTISystem.
                                On NTS I have learned on how to register routes that the associations will be using.
                            </p>

                            <p style="font-weight: bold;font-size: large;"> + Lastly Attach proof or attandnce</p>
                            <p style="font-weight: bold;font-size: large;">Monthly</p>
                            <label for="startDate" style="font-weight: bold;">Start Date</label>
                            <input type="date" class="form-control" id="startDate" name="startDate"></input><br>
                            <label for="endDate" style="font-weight: bold;">End Date</label>
                            <input type="date" class="form-control" id="endDate" name="endDate"></input><br>
                            <label for="hours" style="font-weight: bold;">Enter Monthly Hours</label>
                            <input type="number" class="form-control" id="hours" name="hours"></input><br>
                            <label for="task_description" style="font-weight: bold;">Task Description</label>
                            <textarea type="text" class="form-control" id="task_description"
                                name="task_description"></textarea>


                        </table>
                        <div class="form-group">
                            <label for="proof" style="font-weight: bold;">Attach file as a proof of the activities
                                you have done</label><br>
                            <input type="text" class="form-control" id="file" name="file" required></input>
                            <input type="file" name="file"><br><br>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="mentorEmail">Select your mentorEmail</label><br>
                            <?php
                            include "db/database.php";
                            $sql = "SELECT email FROM mentor";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<select name='mentorEmail'>";
                                echo "<option value=''>" . 'Select Mentor' . "</option>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                        </div>

                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="intern"
                                style="margin-left: 45%; margin-top: 20px;">Send
                        </div>
                    </form>
                <?php } ?>
                <!-- admin -->
                <?php if ($_SESSION['ROLE'] == 'Admin') { ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <table class="table table-hover">
                            <thead>
                                <div class="d-grid gap-3">
                                    <button type="button" id="internButton" class="btn btn-primary btn-block">Interns’
                                        <?php echo date("Y"); ?>
                                    </button>
                                    <script type="text/javascript">
                                        document.getElementById("internButton").onclick = function () {
                                            location.href = "admin-intern.php";
                                        };
                                    </script>

                                    <button type="button" id="mentorButton" class="btn btn-secondary btn-block">Mentors
                                        <?php echo date("Y"); ?>
                                    </button>
                                    <script type="text/javascript">
                                        document.getElementById("mentorButton").onclick = function () {
                                            location.href = "admin-mentor.php";
                                        };
                                    </script>
                                    <button type="button" id="adminButton" class="btn btn-danger btn-block">Admin
                                        <?php echo date("Y"); ?>
                                    </button>
                                    <script type="text/javascript">
                                        document.getElementById("adminButton").onclick = function () {
                                            location.href = "admin-admin.php";
                                        };
                                    </script>
                                </div>
                        </table>
                    </form>
                <?php } ?>
                <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                </script>
            </div>
        </div>
    </div>
</body>
<br><br>
<div class="header">
    <div class="header-left">
        <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
    </div>
</div>

</html>
<?php
include "db/database.php";

if (isset($_POST['intern'])) {
    $startDate = $_POST['startDate'];
    $hours = $_POST['hours'];
    $endDate = $_POST['endDate'];
    $activity = $_POST['activity'];
    $task_description = $_POST['task_description'];
    $name = $_FILES['file']['name'];

    if ($startDate == "" || $hours == "" || $endDate == "" || $activity == "" || $task_description == "" || $name == "") {

        echo "**ALL FIELDS MANDATORY**";
    }

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $extensions_arr = array("pdf", "doc", "docx");
    if (in_array($fileType, $extensions_arr)) {
        $query = "INSERT INTO intern(startDate,endDate, activity, task_description, hours, file) VALUES('$startDate', '$endDate', '$activity', '$task_description', '$hours', '$name')";
        $dashboard_user = mysqli_query($con, $query);
        if (!$dashboard_user) {
            die("Query Failed" . mysqli_error($con));
        }
        move_uploaded_file($_FILES['file']['tmp_name'], $targetDir . $name);
    } else
        echo " file not pdf or doc ";
}

?>