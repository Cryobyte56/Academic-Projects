<?php
require("../dbcon.php");
error_reporting("0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css" integrity="...">

    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <title>Admin Login Page</title>
</head>

<?php
session_start();
if ($_SESSION['logged'] == false) {
?>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-5 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <img class="logo" src="../Assets/logo.png">
                            <h4 style="text-shadow: 2.5px 2.5px 2.5px #aaa;">Admin Sign-In</h4></br>
                            <form action='<?php $_SERVER['PHP_SELF']; ?>' method='post'>
                                <div class="form-floating mb-3">
                                    <input name="adminusername" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="adminpass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login text-uppercase fw-bold mb-2" name="submit" type="submitmit" id="signin">
                                        Sign-In</button>
                                    <div class="d-flex justify-content-center">
                                        <a href="login.php" class="btn btn-outline-secondary p-1 px-5">BACK</a>
                                    </div>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $adminusername = $_POST['adminusername'];
                                        $adminpass = $_POST['adminpass'];

                                        if (empty($adminusername) || empty($adminpass)) {
                                            echo "</br><div class='alert alert-danger text-center' role='alert'>
            All Fields Are Required.
        </div>";
                                        } else {
                                            // Query for admin_accounts table
                                            $admin_sql = "SELECT * FROM admin_account WHERE admin_username = '$adminusername'";
                                            $admin_result = mysqli_query($conn, $admin_sql);

                                            // Check the number of rows separately for each result set
                                            $admin_rows = mysqli_num_rows($admin_result);

                                            if ($admin_rows > 0) {
                                                // Loop through the appropriate result set
                                                $row = mysqli_fetch_array($admin_result);

                                                $db_adminuname = $row['admin_username'];
                                                $db_adminid = $row['admin_id'];
                                                $db_adminpass = $row['admin_password'];
                                                $user_type = $row['admin_type'];

                                                if (($adminpass == $db_adminpass) && $adminusername == $db_adminuname) {
                                                    $_SESSION['logged'] = true;
                                                    $_SESSION['admin_id'] = $db_adminid;
                                                    $_SESSION['admin_type'] = $user_type;

                                                    if ($user_type == 'Admin') {
                                                        header("location:../Admin/home.php");
                                                    }
                                                } else {
                                                    echo "</br><div class='alert alert-danger text-center' role='alert'>
                    Incorrect Username or Password!
                </div>";
                                                }
                                            } else {
                                                echo "</br><div class='alert alert-danger text-center' role='alert'>
                Incorrect Username or Password!
            </div>";
                                            }
                                        }
                                    }
                                    ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

<?php
} else {
    echo "ERROR";
}
?>