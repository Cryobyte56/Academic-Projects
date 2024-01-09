<?php
require("../dbcon.php");
session_start();

if (isset($_SESSION['admin_id'])) {
    $adminId = $_SESSION['admin_id'];
    $queryAdmin = "SELECT * FROM admin_account WHERE admin_id = '$adminId'";
    $resultAdmin = mysqli_query($conn, $queryAdmin);

    if ($resultAdmin) {
        $admin_row = mysqli_fetch_assoc($resultAdmin);
    }

    $cart = "SELECT * FROM cart WHERE user_item = $adminId";
    $cartresult = mysqli_query($conn, $cart);

    $cartItems = array();  // Initialize an array to store cart items

    while ($items = mysqli_fetch_assoc($cartresult)) {
        $cartItems[] = $items;  // Store each item in the array
    }
} else if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Fetch user details
    $queryUser = "SELECT * FROM user_account WHERE user_id = '$userId'";
    $resultUser = mysqli_query($conn, $queryUser);

    while ($row = mysqli_fetch_array($resultUser)) {
        // Use $row to access user details if needed
    }
    $cart = "SELECT * FROM cart WHERE user_item = $userId";
    $cartresult = mysqli_query($conn, $cart);

    $cartItems = array();  // Initialize an array to store cart items

    while ($items = mysqli_fetch_assoc($cartresult)) {
        $cartItems[] = $items;  // Store each item in the array
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/checkout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="../JS/scripts.js"></script>
    <title>Checkout</title>
</head>

<body>
    <!-- Main container -->
    <div class="main-container">

        <!-- Left Container -->
        <div class="child-container">
            <div class="child-content">
                <!-- Content  -->
                <a href="../index.php"><button type="button" id="backButton">Back</button></a>
                <div class="container mt-4">
                    <h2 style="font-weight: bold;">Cart Items</h2>
                    <h5 id="no-item"></h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th id="widthproduct">Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="line">
                            <?php
                            foreach ($cartItems as $item) {
                                $prod_id = $item['prod_id'];
                                $prod_name = $item['prod_name'];
                                $price = $item['prod_price'];
                                $category = $item['prod_category'];
                            ?>
                                <tr>
                                    <td id="widthproduct"><?php echo $prod_name; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td class="price"><?php echo $price; ?></td>
                                    <td class="quantity">
                                        <input type="number" min="1" value="1" class="quantity-input" style="width: 85px;">
                                    </td>
                                    <td><button class="btn btn-sm btn-danger delete-btn" onclick="deleteRow(this)">Delete</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <br /><br />
                    <button class="btn btn-warning" id="calculateBtn">Calculate</button>
                    <button type="button" class="btn btn-success" id="button-payment" data-toggle="modal" data-target="#exampleModal">PAY</button>
                    <br /><br />

                    <p>Total: <span id="total"></span></p>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var calculateBtn = document.getElementById('calculateBtn');
                            calculateBtn.addEventListener('click', calculateTotal);

                            function calculateTotal() {
                                var table = document.querySelector('.table');
                                var rows = table.querySelectorAll('tbody tr');
                                var total = 0;

                                for (var i = 0; i < rows.length; i++) {
                                    var price = parseFloat(rows[i].querySelector('.price').innerText);
                                    var quantity = parseInt(rows[i].querySelector('.quantity-input').value, 10);
                                    total += quantity * price;
                                }

                                document.getElementById('total').innerText = total.toFixed(2);
                            }


                        });

                        function deleteRow(button) {
                            var row = button.closest('tr');
                            row.remove();

                            // Check if there are no rows left after deletion, excluding the header row
                            if (document.querySelectorAll('table tbody tr').length === 0) {
                                // If no items, display the message
                                document.getElementById('no-item').innerText = 'No Item/s In Your Cart';
                            }
                        }
                    </script>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Payment Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="color: green;">Payment Successful!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





    </div>
    </div>

    </div>
</body>
<script src="scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>