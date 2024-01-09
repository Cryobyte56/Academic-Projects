<?php
require("../dbcon.php");
session_start();

if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

    $adminId = $_SESSION['admin_id'];
    $admin_query = "SELECT * FROM admin_account WHERE admin_id = '$adminId'";
    $admin_result = mysqli_query($conn, $admin_query);

    if ($admin_result) {
        $admin_row = mysqli_fetch_assoc($admin_result);
        $admin_name = $admin_row['admin_username'];
        $prof_pic_admin = $admin_row['prof_pic'];
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("location:../Login-Module/logout.php");
}

?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/admin-home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Java Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg" id="nav-top">
        <a class="navbar-brand" href="#" style="font-weight:bold; margin-left:25px; color:white">ADET</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="color:white">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color:white">Product Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" style="color:white">Store</a>
                </li>
                <ul class="navbar-nav" style="margin-left: 620px;">
                    <li class="nav-item dropdown">
                    <li class="nav-item">
                        <a href="../Checkout/checkout.php">
                            <button class="btn" id="cartbtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"></path>
                                </svg>
                                Your Cart
                            </button>
                        </a>
                    </li>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo $prof_pic_admin; ?>" style="width: 25px; height: 25px; background-color: white; border-radius: 50%;">&nbsp;<label style="color: white;"><?php echo $admin_name; ?></label>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="adminprofile.php">Edit Profile</a>
                        <a class="dropdown-item" href="../login-module/logout.php">Logout</a>
                    </div>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>


    <!-- Top Container -->
    <div class="container">
        </br>
        <h2>Hello <?php echo $admin_name; ?></h2></br>
        <h2>Administrator Home Page</h2></br><br />

        <?php

        ob_start();
        error_reporting(0);

        if (isset($_GET['r'])) {
            $message = '';

            switch ($_GET['r']) {
                case 1:
                    $message = "<p style='color:green; font-weight:700; margin-top:10px'>User Added!</p>";
                    break;

                case 2:
                    $message = "<p style='color:#ED7D31; font-weight:700; margin-top:10px'>User Detail/s Changed!</p>";
                    break;

                case 3:
                    $message = "<p style='color:red; font-weight:700; margin-top:10px'>User Deleted!</p>";
                    break;
            }
        }

        ob_end_clean();

        echo $message;

        ?>

    </div>
    <br />

    <!-- Table -->
    <div class="user-container">
        <h1 style="font-weight: bold;">User Management Table</h1><br />
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Profile Picture</th>
                    <th scope="col">User Type</th>
                    <th scope="col">User Status</th>
                    <th scope="col">User Creation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // User Query
                $query = "SELECT * FROM user_account";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                        $user_id = $row['user_id'];
                        $fname = $row['fname'];
                        $mname = $row['mname'];
                        $lname = $row['lname'];
                        $username = $row['username'];
                        $bday = $row['birthday'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $userpic = $row['user_prof_pic'];
                        $user_type = $row['user_type'];
                        $user_status = ($row['user_status'] == '1') ? "<a href='../Actions/status.php?id=$user_id&status=0'>Active</a>" : "<a href='../Actions/status.php?id=$user_id&status=1'>Deactivated</a>";
                        $user_creation = $row['user_creation'];


                        echo "<tr>";
                        echo "<th scope='row'>$user_id</th>";
                        echo "<td>$fname</td>";
                        echo "<td>$mname</td>";
                        echo "<td>$lname</td>";
                        echo "<td>$username</td>";
                        echo "<td>$bday</td>";
                        echo "<td>$email</td>";
                        echo "<td>$phone</td>";
                        echo "<td><img src='../$userpic' style='height: 40px;'></td>";
                        echo "<td>$user_type</td>";
                        echo "<td>$user_status</td>";
                        echo "<td>$user_creation</td>";

                        echo "<td> <a href='../Actions/edit-user.php?id=$user_id'>UPDATE</a>
                        | <a href='../Actions/delete-user.php?id=$user_id'>DELETE</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="add-button">
            <a href="../Actions/add-user.php" class="btn btn-success">Add User</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>