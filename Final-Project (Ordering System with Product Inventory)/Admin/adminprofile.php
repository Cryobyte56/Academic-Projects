<?php
require("../dbcon.php");
session_start();
error_reporting(0);

if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

    $adminId = $_SESSION['admin_id'];
    $query = "SELECT * FROM admin_account WHERE admin_id = '$adminId'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $username = $row['admin_username'];
        $prof_pic = $row['prof_pic'];
    }
?>

    <!-- Profile Upload -->
    <?php
    if (isset($_POST['upload'])) {
        if ($_FILES['changedp']['error'] > 0) {
            echo "ERROR: Upload Fail - " . $_FILES['changedp']['error'];
        } else {
            $temp_name = $_FILES['changedp']['tmp_name'];
            $org_name = $_FILES['changedp']['name'];
            $path = "../Profiles/";
            $upload_pic = "$path/$org_name";

            move_uploaded_file($temp_name, "$path/$org_name");

            $sql = "UPDATE admin_account SET prof_pic = '$upload_pic' WHERE admin_id = $adminId";
            mysqli_query($conn, $sql);
        }
    } ?>

    <!-- Update Details -->
    <div class="alerts">
    <?php

    if (isset($_POST['save'])) {
        $changeUsername = mysqli_real_escape_string($conn, $_POST['changeUsername']);
        $changePass = mysqli_real_escape_string($conn, $_POST['changePass']);
        $changeEmail = mysqli_real_escape_string($conn, $_POST['changeEmail']);

        ob_start();
        if (!empty($changeUsername)) {
            $updateUsername = "UPDATE admin_account SET admin_username = '$changeUsername' WHERE admin_id = $adminId";
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
        $alert1 = ob_get_clean();

        ob_start();
        if (!empty($changePass)) {
            $updatePassword = "UPDATE admin_account SET admin_password = '$changePass' WHERE admin_id = $adminId";
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
        }
        $alert2 = ob_get_clean();

        ob_start();
        if (!empty($changeEmail)) {
            $updateEmail = "UPDATE admin_account SET admin_email = '$changeEmail' WHERE admin_id = $adminId";
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
        $alert3 = ob_get_clean();
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
                        <button type="button" class="btn btn-secondary" onclick='goBack()'>Cancel</button>
                    </div>

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
                            <label class="col-lg-3 control-label">New Password:</label>
                            <div class="col-lg-8">
                                <input name="changePass" class="form-control" type="text" placeholder="New Password" value="">
                                <?php echo $alert2; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input name="changeEmail" class="form-control" type="email" placeholder="Change Email" value="">
                                <?php echo $alert3; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </form>
    </body>

    </html>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>