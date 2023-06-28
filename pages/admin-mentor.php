<!DOCTYPE html>

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
        <?php echo date("Y"); ?> MENTORS’
    </h1>
    <div>
        <div class="header-right">
            <a href="logout.php"> Log out</a>
        </div>
        <div class="header-left">
            <a href="dashboard.php"> Back</a>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body class="body">
    <container class="container">
        <div class="mt-5 mb-3 clearfix">
            <a href="create-mentor.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New
                Mentor</a>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Persal Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db/database.php";
                    $query = 'SELECT mentorId,name,surname,perselNo,email FROM mentor ';
                    $data = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($data)) {
                        echo "<tr>";
                        echo "<td>" . $row['mentorId'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['surname'] . "</td>";
                        echo "<td>" . $row['perselNo'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>";
                        echo '<a href="deleteMentor.php?mentorId=' . $row['mentorId'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash">Delete   </span></a>';
                        echo '<a href="updateMentor.php?mentorId=' . $row['mentorId'] .  '" class="mr-3" title="Update Record" data-toggle="tooltip">  <span class="fa fa-pencil"> Edit</span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        </div>
        </div>

    </container>
</body>
<div class="header">
    <div class="header-left">
        <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
    </div>
</div>
</html>