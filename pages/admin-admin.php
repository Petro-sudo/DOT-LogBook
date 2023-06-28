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
    <h1>
        <?php echo date("Y"); ?> INTERNS’
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


<body class="body">
    <div class="ibox-content">
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Persal Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "db/database.php";

                $query = 'SELECT name,surname,perselNo,email FROM register where role = "Admin"';
                $data = mysqli_query($con, $query);


                while ($row = mysqli_fetch_array($data)) {
                    echo "  <tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['surname'] . "</td>
                            <td>" . $row['perselNo'] . "</td>
                            <td>" . $row['email'] . "</td>
                  </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<div class="header">
    <div class="header-left">
        <img src="image/footer.png" alt="Cinque Terre" width="160%" height="110">
    </div>
</div>

</html>