<?php
require("../dbcon.php");
session_start();

if ($_SESSION['logged'] == true && $_SESSION['admin_type'] == 'Admin') {

    $adminId = $_SESSION['admin_id'];
    $query = "SELECT * FROM admin_account WHERE admin_id = '$adminId'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $username = $row['admin_username'];
        $prof_pic = $row['prof_pic'];
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
                    <a class="nav-link" href="user-accounts.php" style="color:white">User Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" style="color:white">Store</a>
                </li>
            </ul>

            <!-- Move the cart and profile dropdown outside of the ul element -->
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
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo $prof_pic; ?>" style="width: 25px; height: 25px; background-color: white; border-radius: 50%;">&nbsp;<label style="color: white;"><?php echo $username; ?></label>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="adminprofile.php">Edit Profile</a>
                        <a class="dropdown-item" href="../login-module/logout.php">Logout</a>
                    </div>
                </li>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Top Container -->
    <div class="container">
        </br>
        <h2>Hello <?php echo $username; ?></h2></br>
        <h2>Administrator Home Page</h2></br><br />

        <?php

        ob_start();
        error_reporting(0);

        if (isset($_GET['r'])) {
            $message = '';

            switch ($_GET['r']) {
                case 1:
                    $message = "<p style='color:green; font-weight:700; margin-top:10px'>Product Added!</p>";
                    break;

                case 2:
                    $message = "<p style='color:#ED7D31; font-weight:700; margin-top:10px'>Product Detail/s Changed!</p>";
                    break;

                case 3:
                    $message = "<p style='color:red; font-weight:700; margin-top:10px'>Product Deleted!</p>";
                    break;
            }
        }

        ob_end_clean();

        echo $message;

        ?>

    </div>
    <br />

    <!-- Table -->
    <div class="table-container">
        <h1 style="font-weight: bold;">Product Inventory</h1><br />
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Product Owner ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $product_query = "SELECT * FROM products";
                $product_result = mysqli_query($conn, $product_query);

                if (mysqli_num_rows($product_result) > 0) {

                    while ($product_row = mysqli_fetch_array($product_result)) {
                        $product_id = $product_row['product_id'];
                        $product_name = $product_row['product_name'];
                        $product_description = $product_row['product_description'];
                        $category = $product_row['category'];
                        $price = $product_row['price'];
                        $product_pic = $product_row['product_pic'];
                        $product_owner = $product_row['product_owner'];

                        echo "<tr>";
                        echo "<th scope='row'>$product_id</th>";
                        echo "<td>$product_name</td>";
                        echo "<td>$price</td>";
                        echo "<td>$category</td>";
                        echo "<td><img src='$product_pic' style='height: 40px;'></td>";
                        echo "<td>$product_owner</td>";
                        echo "<td> <a href='../Actions/edit-product.php?id=$product_id'>UPDATE</a>
                        | <a href='../Actions/delete-product.php?id=$product_id'>DELETE</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="add-button">
            <a href="../Actions/add-product.php" class="btn btn-success">Add Product</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <form enctype="multipart/form-data" action="home.php" method="post">
        Choose File to Upload: <input type="file" name="fileup" size="30" />
        <input type="submit" name="upload" value="Upload File"></br>
    </form>
    <br /> -->
</body>

</html>