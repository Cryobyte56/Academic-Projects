<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
    error_reporting(0);

    if ($_SESSION['logged'] == true && ($_SESSION['admin_type'] == 'Admin' || $_SESSION['user_type'] == 'Seller')) {

        if (isset($_SESSION['admin_id'])) {
            $id = $_SESSION['admin_id'];
            $queryAdmin = "SELECT * FROM admin_account WHERE admin_id = '$id'";
            $resultAdmin = mysqli_query($conn, $queryAdmin);

            $queryProduct = "SELECT * FROM products";
            $resultProduct = mysqli_query($conn, $queryProduct);
        } else if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) == 'Seller') {
            $id = $_SESSION['user_id'];
            $queryUser = "SELECT * FROM user_account WHERE user_id = '$id'";
            $resultUser = mysqli_query($conn, $queryUser);

            $queryProduct = "SELECT * FROM products";
            $resultProduct = mysqli_query($conn, $queryProduct);
        }
    ?>
        <img src="../Assets/addproduct.png" height="50px" />
        <h3>ADD PRODUCT</a></h3>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <table border="1">
                <tr>
                    <th align="right">Product Name:</th>
                    <td><input type="text" name="pname" /></td>
                </tr>
                <tr>
                    <th align="right">Product Description:</th>
                    <td><input type="text" name="pdescription" /></td>
                </tr>
                <tr>
                    <th align="right">Price:</th>
                    <td><input type="number" name="price" /></td>
                </tr>
                <tr>
                    <th align="right">Product Category:</th>
                    <td>
                        <select name="category">
                            <option value="Nintendo">Nintendo</option>
                            <option value="Headset">Headset</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Playstation">Playstation</option>
                        </select>
                    </td>
                </tr>

                <th colspan="2">
                    <label class="custom-file-upload">
                        <input type="file" name="upload" />
                    </label><br /><br />
                    <input type="submit" value="Add Product" name="sub" class="btn btn-success" />
                </th>
                </tr>

            </table>

            <div class="btn-group">
                <a class="btn btn-secondary" style="border-radius: 25px; width:120px;" onclick="goBack()">Your Home Page</a>
                <input type="reset" value="Reset" name="reset" style="border-radius: 25px; width:120px; margin-left: 15px" class="btn btn-secondary" />
            </div>
        </form>

        <?php
        if (isset($_POST['sub'])) {
            $pname = $_POST['pname'];
            $pdesc = $_POST['pdescription'];
            $price = $_POST['price'];
            $cat = $_POST['category'];

            $temp_name = $_FILES['upload']['tmp_name'];
            $org_name = $_FILES['upload']['name'];
            $path = "../Assets";

            $upload_pic =  "$path/$org_name";

            move_uploaded_file($temp_name, "$path/$org_name");

            if (empty($pname) || empty($pdesc) || empty($price)) {
                echo "<div class='alert alert-danger text-center' role='alert'>
            All Fields Are Required!
        </div>";
            } else {

                $sql = "INSERT INTO products (product_name, product_description, category, price, product_pic, product_owner)
        VALUES ('$pname', '$pdesc', '$cat', '$price', '$upload_pic', '$id')";

                $q = mysqli_query($conn, $sql);

                if (!$q) {
                    echo "<div class='alert alert-danger text-center' role='alert'>
            Invalid Input!
        </div>";
                } else {
                    echo "<div class='alert alert-success text-center' role='alert'>
                        Added!
                      </div>";
                }
            }
        }

        ?>

    <?php
    } else {
        echo "<div class='alert alert-danger text-center' role='alert'>
            ERROR!
          </div>";
    }
    ?>

</body>

</html>

<script>
function goBack() {
    window.history.back();
}
</script>