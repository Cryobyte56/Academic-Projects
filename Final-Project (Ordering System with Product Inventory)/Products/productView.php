<?php
session_start();
error_reporting(0);
require("../dbcon.php");

$userId = null; // Initialize the variable

if (isset($_SESSION['admin_id'])) {
    $userId = $_SESSION['admin_id'];
    $queryUser = "SELECT * FROM admin_account WHERE admin_id = '$userId'";
} else if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $queryUser = "SELECT * FROM user_account WHERE user_id = '$userId'";
}

if (!is_null($userId)) {
    $resultUser = mysqli_query($conn, $queryUser);

    if ($resultUser) {
        while ($row = mysqli_fetch_array($resultUser)) {
            // Handle common user information here (if needed)
            $username = $row['username'];
            $prof_pic = $row['user_prof_pic'];

            // Additional handling for admin-specific information
            if (isset($_SESSION['admin_id'])) {
                $adminUname = $row['admin_username'];
                $admin_prof_pic = $row['prof_pic'];
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/productstyles.css">
    <script src="../JS/scripts.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Document</title>
</head>

<body>
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
                        <a class="dropdown-item" href="../category/nintendo.php">Nintendo Products</a>
                        <a class="dropdown-item" href="../category/playstation.php">Playstation Console</a>
                        <a class="dropdown-item" href="../category/laptop.php">Gaming Laptops</a>
                        <a class="dropdown-item" href="../category/headset.php">Gaming Headset</a>
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
                    echo "../" . $prof_pic;
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
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="' . (isset($_SESSION['admin_id']) ? '../Admin/adminprofile.php' : '../userprofile.php') . '">Edit Profile</a>
            <a class="dropdown-item" href="../login-module/logout.php">Logout</a>
        </div>';
            }
            ?>

            <?php if (!isset($_SESSION['logged'])) {
                echo '<li class="nav-item" id="dot">
            <a class="nav-link" href="login-module/login.php">Sign-In</a>
        </li></ul>';
            }
            ?>
        </div>
    </nav>

    <?php
    $prod_id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $queryProduct = "SELECT * FROM products WHERE product_id = ?";
    $stmt = mysqli_prepare($conn, $queryProduct);
    mysqli_stmt_bind_param($stmt, "i", $prod_id);
    mysqli_stmt_execute($stmt);

    $resultProduct = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultProduct)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_pic = $row['product_pic'];
        $product_description = $row['product_description'];
        $product_category = $row['category'];
        $product_price = $row['price'];
        $newPath = str_replace('../', '', $product_pic);

        if (isset($_POST['addtocart'])) {
            // Check if the product is already in the cart
            $checkIfExistsQuery = "SELECT * FROM cart WHERE prod_id = ? AND user_item = ?";
            $stmtCheckIfExists = mysqli_prepare($conn, $checkIfExistsQuery);
            mysqli_stmt_bind_param($stmtCheckIfExists, "is", $prod_id, $userId);
            mysqli_stmt_execute($stmtCheckIfExists);
            $resultIfExists = mysqli_stmt_get_result($stmtCheckIfExists);

            if (mysqli_num_rows($resultIfExists) == 0) {
                // Product is not in the cart, so insert it
                $insertQuery = "INSERT INTO cart (prod_id, prod_name, prod_price, prod_category, user_item) 
                                VALUES (?, ?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($conn, $insertQuery);
                mysqli_stmt_bind_param($stmtInsert, "isisi", $prod_id, $product_name, $product_price, $product_category, $userId);


                if (mysqli_stmt_execute($stmtInsert)) {
                    // Use JavaScript to display an alert
                    echo "<script>alert('Product added to cart successfully!');</script>";
                } else {
                    echo "<script>alert('Error adding product to cart: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                // Product is already in the cart, show an alert
                echo "<script>alert('Product is already in the cart.');</script>";
            }
        }

        // Check if the user is logged in
        $isLoggedIn = isset($_SESSION['logged']) && $_SESSION['logged'] == true;
    } else {
        echo "Product not found!";
        exit;
    }
    ?>


    <!--Product Details-->
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card" id="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-5"> <img id="main-image" src="<?php echo $product_pic ?>" width="150px" /> </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="left-container">
                            <div class="product p-4" id="right-container">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <span class="ml-1"><a href="../index.php"><button class="btn btn-info">BACK</button></a></span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $product_category ?></span>
                                        <h5 class="text-uppercase"><?php echo $product_name ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo "$" . $product_price ?></span>
                                        </div>
                                    </div>
                                    <div class="cart mt-4 align-items-center">
                                        <button id="addToCartBtn" class="btn btn-success text-uppercase mr-2 px-4" name="addtocart">Add to Cart</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>



                    <!-- Product Details in Bullet Form -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title text-uppercase font-weight-bold mb-3">Product Details</h4>
                                    <p id="full-description">
                                        <?php echo $product_description ?>
                                    </p>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="fas fa-image mr-2 text-info"></i> Clear, high-quality images</li>
                                        <li class="mb-2"><i class="fas fa-cogs mr-2 text-info"></i> Specify whether the console is refurbished or in its original state</li>
                                        <li class="mb-2"><i class="fas fa-info-circle mr-2 text-info"></i> Provide details on functionality and any cosmetic wear</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Section -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h4 class="text-uppercase ml-4">Chat with Seller</h4>
                            <div class="chat-container">
                                <div class="chat-header">
                                    Chat with Seller
                                </div>
                                <div class="chat-body" id="chatBody">
                                    <div class="message sender">
                                        <p>Hello! Is the item still available?</p>
                                    </div>
                                    <div class="message receiver">
                                        <p>Yes, it's still available. Are you interested?</p>
                                    </div>
                                    <!-- Add more messages here -->
                                </div>
                                <div class="input-container">
                                    <input type="text" id="messageInput" placeholder="Type your message...">
                                    <button onclick="sendMessage()">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>