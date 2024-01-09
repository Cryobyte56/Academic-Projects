<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>

<body>

    <?php
    include("../dbcon.php");

    session_start();

    if ($_SESSION['logged'] == true) {
        $id = $_GET['id'];
    
        if ($_SESSION['admin_type'] == 'Admin') {
            // Admin session
            $sql = "DELETE FROM products where product_id = $id";
            mysqli_query($conn, $sql);
            header("location:../Admin/home.php?r=3");
        } elseif ($_SESSION['user_type'] == 'Seller') {
            // Seller session
            $sql = "DELETE FROM products where product_id = $id";
            mysqli_query($conn, $sql);
            header("location:../Seller/home.php?r=3");
        } else {
            // Redirect to a default location if neither Admin nor Seller
            header("location:../default_page.php");
        }
    } else {
        // Redirect to login page if not logged in
        header("location:../login.php");
    }
    ?>

</body>

</html>