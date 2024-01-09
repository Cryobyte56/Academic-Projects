<?php
require("dbcon.php");
session_start();
error_reporting(0);

if ($_SESSION['logged'] == true && ($_SESSION['user_type'] == 'Buyer' || $_SESSION['user_type'] == 'Seller')) {

    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM user_account WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $username = $row['username'];
        $prof_pic = $row['user_prof_pic'];
    }
?>



    <!-- Update Details -->
    <div class="alerts">
    <?php


    if (isset($_POST['save'])) {
        $changeUsername = mysqli_real_escape_string($conn, $_POST['changeUsername']);
        $changeFirstName = mysqli_real_escape_string($conn, $_POST['changeFirstName']);
        $changeMiddleName = mysqli_real_escape_string($conn, $_POST['changeMiddleName']);
        $changeLastName = mysqli_real_escape_string($conn, $_POST['changeLastName']);
        $changeEmail = mysqli_real_escape_string($conn, $_POST['changeEmail']);
        $changePhone = mysqli_real_escape_string($conn, $_POST['changePhone']);
        $changeBirthDate = mysqli_real_escape_string($conn, $_POST['changeBirthDate']);
        $changePassword = mysqli_real_escape_string($conn, $_POST['changePassword']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);


        ob_start();

        // Update Username
        if (!empty($changeUsername)) {
            $updateUsername = "UPDATE user_account SET username = '$changeUsername' WHERE user_id = $id";
            $updateUsernameResult = mysqli_query($conn, $updateUsername);

            if ($updateUsernameResult) {
                echo "<div class='alert alert-success' role='alert'>
                Username Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Username Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update First Name
        if (!empty($changeFirstName)) {
            $updateFirstName = "UPDATE user_account SET fname = '$changeFirstName' WHERE user_id = $id";
            $updateFirstNameResult = mysqli_query($conn, $updateFirstName);

            if ($updateFirstNameResult) {
                echo "<div class='alert alert-success' role='alert'>
                First Name Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                First Name Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Middle Name
        if (!empty($changeMiddleName)) {
            $updateMiddleName = "UPDATE user_account SET mname = '$changeMiddleName' WHERE user_id = $id";
            $updateMiddleNameResult = mysqli_query($conn, $updateMiddleName);

            if ($updateMiddleNameResult) {
                echo "<div class='alert alert-success' role='alert'>
                Middle Name Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Middle Name Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Last Name
        if (!empty($changeLastName)) {
            $updateLastName = "UPDATE user_account SET lname = '$changeLastName' WHERE user_id = $id";
            $updateLastNameResult = mysqli_query($conn, $updateLastName);

            if ($updateLastNameResult) {
                echo "<div class='alert alert-success' role='alert'>
                Last Name Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Last Name Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Email
        if (!empty($changeEmail)) {
            $updateEmail = "UPDATE user_account SET email = '$changeEmail' WHERE user_id = $id";
            $updateEmailResult = mysqli_query($conn, $updateEmail);

            if ($updateEmailResult) {
                echo "<div class='alert alert-success' role='alert'>
                Email Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Email Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Phone Number
        if (!empty($changePhone)) {
            $updatePhone = "UPDATE user_account SET phone = '$changePhone' WHERE user_id = $id";
            $updatePhoneResult = mysqli_query($conn, $updatePhone);

            if ($updatePhoneResult) {
                echo "<div class='alert alert-success' role='alert'>
                Phone Number Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Phone Number Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Birth Date
        if (!empty($changeBirthDate)) {
            $updateBirthDate = "UPDATE user_account SET birthday = '$changeBirthDate' WHERE user_id = $id";
            $updateBirthDateResult = mysqli_query($conn, $updateBirthDate);

            if ($updateBirthDateResult) {
                echo "<div class='alert alert-success' role='alert'>
                Birth Date Updated!
              </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Birth Date Update Error
              </div>" . mysqli_error($conn);
            }
        }

        // Update Password
        if (!empty($changePassword) && !empty($confirmPassword)) {
            // Check if passwords match
            if ($changePassword === $confirmPassword) {
                // Use md5(md5()) for hashing
                $hashedPassword = md5(md5($changePassword));

                $updatePassword = "UPDATE user_account SET password = '$hashedPassword' WHERE user_id = $id";
                $updatePasswordResult = mysqli_query($conn, $updatePassword);

                if ($updatePasswordResult) {
                    echo "<div class='alert alert-success' role='alert'>
                            Password Updated!
                          </div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Password Update Error
                          </div>" . mysqli_error($conn);
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        Passwords do not match
                      </div>";
            }
        }


        $alert1 = ob_get_clean();
    }
} else {
    header("location:../Login-Module/logout.php");
}
    ?>
    </div>

    <!-- HTML -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="admin-home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>EDIT PROFILE</title>
    </head>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

        body {
            margin-top: 20px;
            background-color: #427D9D;
            color: white;
            font-family: "Montserrat", sans-serif;
        }

        .avatar {
            width: 200px;
            height: 200px;
        }

        .alerts {
            width: 100px;
            margin: 0 auto;
        }
    </style>

    <body>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="container bootstrap snippets bootdey">
                <h1 style="color:white">Edit Profile</h1>
                <hr style="background-color:gainsboro;">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-3">
                        <div class="text-center">
                            <img src="<?php echo $prof_pic; ?>" class="avatar img-circle img-thumbnail" alt="avatar"></br></br><br />
                            <h6>Change Photo</h6>

                            <label class="custom-file-upload">
                                <input type="file" name="changedp" />
                            </label>
                            <input type="submit" name="upload" value="Upload" style="margin: 0; justify-content:left" />

                        </div><br /><br />
                        <input type="submit" class="btn btn-primary" name="save" />&nbsp&nbsp
                        <a href="index.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
                    </div>

                    <!-- Profile Upload -->
                    <?php
                    if (isset($_POST['upload'])) {
                        if ($_FILES['changedp']['error'] > 0) {
                            echo "ERROR: Upload Fail - " . $_FILES['changedp']['error'];
                        } else {
                            $temp_name = $_FILES['changedp']['tmp_name'];
                            $org_name = $_FILES['changedp']['name'];
                            $path = "Profiles";
                            $upload_pic = "$path/$org_name";

                            move_uploaded_file($temp_name, "$path/$org_name");

                            $sql = "UPDATE user_account SET user_prof_pic = '$upload_pic' WHERE user_id = $id";
                            mysqli_query($conn, $sql);
                        }
                    } ?>

                    <!-- Right Column -->
                    <div class="col-md-9 personal-info">
                        <h2>Personal info</h2>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username:</label>
                            <div class="col-lg-8">
                                <input name="changeUsername" class="form-control" type="text" placeholder="Change Username" value="">
                                <?php echo $alert1; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">First Name:</label>
                            <div class="col-lg-8">
                                <input name="changeFirstName" class="form-control" type="text" placeholder="Change First Name" value="">
                                <?php echo $alert2; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Middle Name:</label>
                            <div class="col-lg-8">
                                <input name="changeMiddleName" class="form-control" type="text" placeholder="Change Middle Name (Optional)" value="">
                                <?php echo $alert3; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name:</label>
                            <div class="col-lg-8">
                                <input name="changeLastName" class="form-control" type="text" placeholder="Change Last Name" value="">
                                <?php echo $alert4; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email Address:</label>
                            <div class="col-lg-8">
                                <input name="changeEmail" class="form-control" type="email" placeholder="Change Email Address" value="">
                                <?php echo $alert5; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone Number:</label>
                            <div class="col-lg-8">
                                <input name="changePhone" class="form-control" type="number" placeholder="Change Phone Number" value="">
                                <?php echo $alert6; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Birth Date:</label>
                            <div class="col-lg-8">
                                <input name="changeBirthDate" class="form-control" type="date" placeholder="Change Birth Date" value="">
                                <?php echo $alert7; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password:</label>
                            <div class="col-lg-8">
                                <input name="changePassword" class="form-control" type="password" placeholder="Change Password">
                                <?php echo $passwordAlert; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Confirm Password:</label>
                            <div class="col-lg-8">
                                <input name="confirmPassword" class="form-control" type="password" placeholder="Confirm Password">
                                <?php echo $confirmPasswordAlert; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
        </form>
    </body>

    </html>