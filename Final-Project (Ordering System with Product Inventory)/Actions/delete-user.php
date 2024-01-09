<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>

<body>

    <?php
    include("../dbcon.php");

    session_start();

    if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

        $id = $_GET['id'];
        $sql = "DELETE FROM user_account where user_id = $id";

        mysqli_query($conn, $sql);

        header("location:../Admin/user-accounts.php?r=3");
    ?>



    <?php } ?>

</body>

</html>