<?php
include("../dbcon.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/register.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <section class="container">
        <header>REGISTRATION FORM</header>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form">

            <!-- Basic Details -->

            <div class="input-box">
                <label id="labels">Username</label>
                <input name="uname" type="text" placeholder="Enter Username" required />
            </div>
            <div class="input-box">
                <label id="labels">First Name</label>
                <input name="fname" type="text" placeholder="Enter First Name" required />
            </div>
            <div class="input-box">
                <label id="labels">Middle Name</label>
                <input name="mname" type="text" placeholder="Enter Middle Name (Optional)" />
            </div>
            <div class="input-box">
                <label id="labels">Last Name</label>
                <input name="lname" type="text" placeholder="Enter Last Name" required />
            </div>
            <div class="input-box">
                <label id="labels">Email Address</label>
                <input name="email" type="email" placeholder="Enter Email Address" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label id="labels">Phone Number</label>
                    <input name="phone" type="number" placeholder="Enter Phone Number" required />
                </div>
                <div class="input-box">
                    <label id="labels">Birth Date</label>
                    <input name="bday" type="date" placeholder="Enter Birth Date" required />
                </div>
            </div>

            
            <!-- User Type -->

            <div class="user-type" id="labels">
                <h3 id="labels">User Type</h3>
                <div class="user-option">
                    <div class="user">
                        <input type="radio" name="user-type" value="Buyer" checked />
                        <label>Buyer</label>
                    </div>
                    <div class="user">
                        <input type="radio" name="user-type" value="Seller" />
                        <label>Seller</label>
                    </div>
                </div>
            </div>

            <!-- Other Details -->

            <div class="input-box address">
                <label id="labels">Password</label>
                <input name="pass" type="password" placeholder="Enter Password" required />
                <input name="cpass" type="password" placeholder="Confirm Password" required />
            </div>
            <div class="buttons">
                <input type="submit" name="sub" id="submit" /></br>
                <a href="../Login-Module/login.php" id="cancel">BACK</a>
            </div>
            </div>
        </form>

        <?php
        if (isset($_POST['sub'])) {
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $username = $_POST['uname'];
            $password = $_POST['pass'];
            $password2 = $_POST['cpass'];
            $birthday = $_POST['bday'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $usertype = $_POST['user-type'];

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
    </section>
</body>

<!-- Add Bootstrap JS script (you may need Popper.js and jQuery for some components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</html>