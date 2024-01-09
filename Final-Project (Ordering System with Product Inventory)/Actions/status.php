<html>

<head>
</head>

<body>
    <?php

    include("../dbcon.php");

    session_start();

    if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {


        $id = $_GET['id'];
        $stat = $_GET['status'];

        $sql = "UPDATE user_account set user_status ='$stat' where user_id = $id";

        mysqli_query($conn, $sql);

        header("location:../Admin/user-accounts.php");
    } else {

        header('Location:../logout.php');
    }
    ?>

</body>

</html>