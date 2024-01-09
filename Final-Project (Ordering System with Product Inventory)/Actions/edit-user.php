<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>

<body>

    <?php
    include("../dbcon.php");

    session_start();

    if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

        $id = $_GET['id'];

        $sql = "SELECT * FROM user_account WHERE user_id = $id";

        $query = mysqli_query($conn, $sql);

        while ($getData = mysqli_fetch_array($query)) {
            $user_id = $getData['user_id'];
            $fname = $getData['fname'];
            $mname = $getData['mname'];
            $lname = $getData['lname'];
            $username = $getData['username'];
            $password = $getData['password'];
            $bday = $getData['birthday'];
            $email = $getData['email'];
            $phone = $getData['phone'];
            $user_type = $getData['user_type'];
        }

    ?>


        <img src="../Assets/edit-prod.png" height="50px" />
        <h3>Edit User Details</h3>

        <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>" method="post">
            <table border="1">
                <tr>
                    <th align="right">User ID:</th>
                    <td><input type="text" name="user_id" value="<?php echo $user_id ?>" disabled /></td>
                </tr>
                <tr>
                    <th align="right">First Name:</th>
                    <td><input type="text" name="fname" value="<?php echo $fname ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Middle Name:</th>
                    <td><input type="text" name="mname" value="<?php echo $mname ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Last Name:</th>
                    <td><input type="text" name="lname" value="<?php echo $lname ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Username:</th>
                    <td><input type="text" name="username" value="<?php echo $username ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Password:</th>
                    <td><input type="password" name="password" value="<?php echo $password ?>" disabled /></td>
                </tr>
                <tr>
                    <th align="right">Birthday:</th>
                    <td><input type="date" name="birthday" value="<?php echo $bday ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Email:</th>
                    <td><input type="email" name="email" value="<?php echo $email ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Phone:</th>
                    <td><input type="tel" name="phone" value="<?php echo $phone ?>" /></td>
                </tr>
                <tr>
                    <th align="right">User Type:</th>
                    <td>
                        <input type="radio" name="user_type" value="Buyer" <?php echo ($user_type === 'Buyer') ? 'checked' : ''; ?>> Buyer
                        <input type="radio" name="user_type" value="Seller" <?php echo ($user_type === 'Seller') ? 'checked' : ''; ?>> Seller
                    </td>
                </tr>


                <tr>
                    <th colspan="2">
                        <input type="submit" value="Update Details" name="submit" class="btn btn-success" />
                    </th>
                </tr>
            </table>

            <?php

            if (isset($_POST['submit'])) {

                $updated_fname = $_POST['fname'];
                $updated_mname = $_POST['mname'];
                $updated_lname = $_POST['lname'];
                $updated_username = $_POST['username'];
                $updated_bday = $_POST['birthday'];
                $updated_email = $_POST['email'];
                $updated_phone = $_POST['phone'];
                $updated_user_type = $_POST['user_type'];

                $sql = "UPDATE user_account 
                SET fname = '$updated_fname',
                    mname = '$updated_mname',
                    lname = '$updated_lname',
                    username = '$updated_username',
                    birthday = '$updated_bday',
                    email = '$updated_email',
                    phone = '$updated_phone',
                    user_type = '$updated_user_type'
                WHERE user_id = '$id'";


                $q = mysqli_query($conn, $sql);

                if (!$q) {
                    echo "<div class='alert alert-danger text-center' role='alert'>
                        Invalid Input!
                      </div>";
                } else {
                    header("location:../Admin/user-accounts.php?r=2");
                }
            }
            ?>


            <div class="btn-group">
                <a href="../Admin/user-accounts.php" class="btn btn-secondary" style="border-radius: 25px; width:120px;">Your Home Page</a>
                <input type="reset" value="Reset" name="reset" style="border-radius: 25px; width:120px; margin-left: 15px" class="btn btn-secondary" />
            </div>

        <?php
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>
            ERROR!
          </div>";
    }
        ?>
        </form>

</body>

</html>