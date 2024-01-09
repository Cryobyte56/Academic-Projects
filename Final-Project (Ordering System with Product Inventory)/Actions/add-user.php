<?php
include("../dbcon.php");

session_start();

if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

?>

    <?php
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $password2 = $_POST['cpass'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $usertype = $_POST['user_type'];

        if (empty($fname) || empty($lname) || empty($username) || empty($password) || empty($birthday) || empty($email) || empty($phone) || empty($password2)) {
            echo "<div class='alert alert-danger text-center' role='alert'>
                        All Fields Are Required!
                      </div>";
        } else {
            if ($password == $password2) {
                $enc_pass = md5((md5($password)));

                $sql = "INSERT INTO user_account (fname, mname, lname, username, password, birthday, email, phone, user_type) 
                VALUES ('$fname', '$mname', '$lname', '$username', '$enc_pass', '$birthday', '$email', '$phone', '$usertype')";


                $q = mysqli_query($conn, $sql);

                if (!$q) {
                    echo "<div class='alert alert-danger text-center' role='alert'>
                        Registration Error! Retry
                      </div>";
                } else {
                    echo "<div class='alert alert-success text-center' role='alert'>
                        SUCCESSFULLY REGISTERED
                      </div>";
                }
            } else {
                echo "<div class='alert alert-danger text-center' role='alert'>
                        Password Does Not Match, Retry
                      </div>";
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Admin</title>
    </head>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap");

        * {
            font-family: "Montserrat", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h1,
        h2,
        h3 {
            text-align: center;
        }

        img {
            margin: 10px 0;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
        }

        select,
        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .btn-group {
            margin-top: 20px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>

    <body>
        <img src="../Assets/edit-prod.png" height="50px" />
        <h3>Edit Product Details</h3>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <table border="1">
                <tr>
                    <th align="right">User ID:</th>
                    <td><input type="text" name="user_id" /></td>
                </tr>
                <tr>
                    <th align="right">First Name:</th>
                    <td><input type="text" name="fname" /></td>
                </tr>
                <tr>
                    <th align="right">Middle Name:</th>
                    <td><input type="text" name="mname" /></td>
                </tr>
                <tr>
                    <th align="right">Last Name:</th>
                    <td><input type="text" name="lname" /></td>
                </tr>
                <tr>
                    <th align="right">Username:</th>
                    <td><input type="text" name="username" /></td>
                </tr>
                <tr>
                    <th align="right">Password:</th>
                    <td><input type="password" name="pass" /></td>
                </tr>
                <tr>
                    <th align="right">Confirm Password:</th>
                    <td><input type="password" name="cpass" /></td>
                </tr>
                <tr>
                    <th align="right">Birthday:</th>
                    <td><input type="date" name="birthday" /></td>
                </tr>
                <tr>
                    <th align="right">Email:</th>
                    <td><input type="email" name="email" /></td>
                </tr>
                <tr>
                    <th align="right">Phone:</th>
                    <td><input type="tel" name="phone" /></td>
                </tr>
                <tr>
                    <th align="right">User Type:</th>
                    <td>
                        <input type="radio" name="user_type" value="Buyer" checked> Buyer
                        <input type="radio" name="user_type" value="Seller"> Seller
                    </td>
                </tr>


                <tr>
                    <th colspan="2">
                        <input type="submit" value="Add User" name="submit" class="btn btn-success" />
                    </th>
                </tr>
            </table>
            <div class="btn-group">
                <a href="../Admin/user-accounts.php" class="btn btn-secondary" style="border-radius: 25px; width:120px;">Your Home Page</a>
                <input type="reset" value="Reset" name="reset" style="border-radius: 25px; width:120px; margin-left: 15px" class="btn btn-secondary" />
            </div>
    </body>

    </html>
<?php
} else {
    echo "<div class='alert alert-danger text-center' role='alert'>
            ERROR!
          </div>";
          header("location:../Login-Module/logout.php");
}
?>