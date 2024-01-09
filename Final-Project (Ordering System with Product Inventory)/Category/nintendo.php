<?php
require("../dbcon.php");
session_start();

if (isset($_SESSION['admin_id'])) {
    $adminId = $_SESSION['admin_id'];
    $queryAdmin = "SELECT * FROM admin_account WHERE admin_id = '$adminId'";
    $resultAdmin = mysqli_query($conn, $queryAdmin);

    if ($resultAdmin) {
        $admin_row = mysqli_fetch_assoc($resultAdmin);
        $adminUname = $admin_row['admin_username'];
        $admin_prof_pic = $admin_row['prof_pic'];
    }

    $queryProduct = "SELECT * FROM products";
    $resultProduct = mysqli_query($conn, $queryProduct);
} else if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $queryUser = "SELECT * FROM user_account WHERE user_id = '$userId'";
    $resultUser = mysqli_query($conn, $queryUser);

    while ($row = mysqli_fetch_array($resultUser)) {
        $username = $row['username'];
        $prof_pic = $row['user_prof_pic'];
    }

    $queryProduct = "SELECT * FROM products";
    $resultProduct = mysqli_query($conn, $queryProduct);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/category.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>GadgeTech Shopping</title>
</head>

<body>
    <header>
        <img src="../Assets/logo.png" style="width: 200px; margin-bottom: 15px">
        <h1>GadgeTech Shopping</h1>
        <h5>Gadget Shopping Made Convenient</h5>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contacts.php">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nintendo.php">Nintendo Products</a>
                        <a class="dropdown-item" href="playstation.php">Playstation Console</a>
                        <a class="dropdown-item" href="laptop.php">Gaming Laptops</a>
                        <a class="dropdown-item" href="headset.php">Gaming Headset</a>
                    </div>
                </li>
            </ul>

            <?php
            if (isset($_SESSION['admin_id']) || isset($_SESSION['user_id'])) {
                echo '<ul class="navbar-nav ml-auto"> <!-- Change "mr-3" to "ml-auto" to align to the right -->
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
            <li class="nav-item dropdown">';
            } else {
            }
            ?>

            <?php
            if (isset($_SESSION['admin_id']) || isset($_SESSION['user_id'])) {
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="';

                if (isset($_SESSION['admin_id'])) {
                    echo $admin_prof_pic;
                } else {
                    echo "../".$prof_pic;
                }

                echo '" style="width: 35px; height: 35px; background-color: white; border-radius: 50%; border: 2px solid;">&nbsp;<label style="color: black;">';

                if (isset($_SESSION['admin_id'])) {
                    echo $adminUname;
                } else if (isset($_SESSION['user_id'])) {
                    echo $username;
                } else {
                    echo "";
                }

                echo '</label>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';

                // Check if the user is an admin
                if (isset($_SESSION['admin_id'])) {
                    echo '<a class="dropdown-item" href="../Admin/adminprofile.php">Edit Profile</a>
          <a class="dropdown-item" href="../Admin/home.php">Admin Dashboard</a>';
                } elseif (isset($_SESSION['user_id'])) {
                    // Check if the user is a regular user
                    $userId = $_SESSION['user_id'];
                    $queryUserType = "SELECT user_type FROM user_account WHERE user_id = '$userId'";
                    $resultUserType = mysqli_query($conn, $queryUserType);

                    if ($resultUserType) {
                        $row = mysqli_fetch_assoc($resultUserType);
                        $userType = $row['user_type'];

                        // Edit Profile link for all users
                        echo '<a class="dropdown-item" href="../userprofile.php">Edit Profile</a>';

                        // Check if the user is a seller
                        if ($userType == 'Seller') {
                            echo '<a class="dropdown-item" href="Actions/add-product.php">Add Product</a>';
                        } else {
                        }
                    }
                }

                echo '<a class="dropdown-item" href="login-module/logout.php">Logout</a>
</div>';
            }
            ?>

            <?php if (!isset($_SESSION['logged'])) {
                echo '<li class="nav-item" id="dot">
            <a class="nav-link" href="../login-module/login.php">Sign-In</a>
        </li></ul>';
            }
            ?>
        </div>
    </nav>

    <!-- Product Cards -->
    <div class="category-title">
        <h3>Nintendo Console</h3>
    </div>

    <div class="container mt-4">

        <?php
        $queryProduct = "SELECT * FROM products";
        $resultProduct = mysqli_query($conn, $queryProduct);

        if ($resultProduct && mysqli_num_rows($resultProduct) > 0) {
            $counter = 0;

            while ($row = mysqli_fetch_assoc($resultProduct)) {
                $prod_category = $row['category'];

                // Check if the category is 'Nintendo'
                if ($prod_category == 'Nintendo') {
                    // Your code for displaying or processing the product goes here
                    $prod_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_pic = $row['product_pic'];
                    $product_description = $row['product_description'];
                    $product_price = $row['price'];

                    // Display the product card
                    if ($counter % 3 == 0) {
                        echo '<div class="row">';
                    }
                    echo '
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="' . $product_pic . '" class="card-img-top mx-auto" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">' . $product_name . '</h5>
                        <p class="card-text">' . $product_description . '</p>
                        <h5>' . $product_price . '</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3" id="product-button">
                            <div class="d-flex flex-row align-items-start">
                                <button class="btn btn-success" style="min-width: 90px; margin:2px; margin-top: 15px">Add to Cart</button>
                                <a href="../Products/productView.php?id=' . $prod_id . '"><button class="btn btn-info" style="min-width: 40px; margin:2px; margin-top: 15px"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

                    // Check if it's the end of the row
                    if ($counter % 3 == 2) {
                        echo '</div>';
                    }

                    // Increment the counter
                    $counter++;
                }
            }

            // Close the last row if the number of products is not a multiple of 3
            if ($counter % 3 !== 0) {
                echo '</div>';
            }

            // Free the result set
            mysqli_free_result($resultProduct);
        } else {
            // Handle the query error or display a message for no products
            echo "Error: " . mysqli_error($conn);
        }
        ?>




    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2023 Simple Shopping. All rights reserved.</p>
    </footer>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all the quantity input elements and buttons with the specified class
            const quantityInputs = document.querySelectorAll('.quantity');
            const plusButtons = document.querySelectorAll('.plusBtn');
            const minusButtons = document.querySelectorAll('.minusBtn');

            // Add click event listeners to each set of buttons
            for (let i = 0; i < plusButtons.length; i++) {
                plusButtons[i].addEventListener('click', function() {
                    incrementQuantity(quantityInputs[i]);
                });

                minusButtons[i].addEventListener('click', function() {
                    decrementQuantity(quantityInputs[i]);
                });
            }

            // Function to increment the quantity
            function incrementQuantity(input) {
                input.value = parseInt(input.value) + 1;
            }

            // Function to decrement the quantity, with a minimum value of 0
            function decrementQuantity(input) {
                if (parseInt(input.value) > 0) {
                    input.value = parseInt(input.value) - 1;
                }
            }
        });

        $(document).ready(function() {
            $('.input-group button').on('click', function() {
                // Clear focus on button click
                $(this).blur();
            });
        });
    </script>
</body>

</html>