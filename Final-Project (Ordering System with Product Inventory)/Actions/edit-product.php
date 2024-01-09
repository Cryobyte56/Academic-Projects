<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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

        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE product_id = $id";

        $query = mysqli_query($conn, $sql);

        while ($getData = mysqli_fetch_array($query)) {
            $pname = $getData['product_name'];
            $pdesc = $getData['product_description'];
            $category = $getData['category'];
            $price = $getData['price'];
            $prod_pic = $getData['product_pic'];
        }

    ?>


        <img src="../Assets/edit-prod.png" height="50px" />
        <h3>Edit Product Details</h3>

        <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>" method="post" enctype="multipart/form-data">
            <table border="1">
                <tr>
                    <th align="right">Product Name:</th>
                    <td><input type="text" name="pname" value="<?php echo $pname ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Product Description:</th>
                    <td><input type="text" name="pdesc" value="<?php echo $pdesc ?>" /></td>
                </tr>
                <tr>
                    <th align="right">Price:</th>
                    <td><input type="number" name="price" value="<?php echo $price ?>" /></td>
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
                <tr>
                    <th colspan="2">
                        <label class="custom-file-upload">
                            <input type="file" name="upload" />
                        </label><br /><br />
                        <input type="submit" value="Update Product" name="submit" class="btn btn-success" />
                    </th>
                </tr>
            </table>

            <?php

            if (isset($_POST['submit'])) {
                $updatepname = $_POST['pname'];
                $updatepdesc = $_POST['pdesc'];
                $updatecategory = $_POST['category'];
                $updateprice = $_POST['price'];

                if ($_FILES['upload']['error'] === UPLOAD_ERR_OK) {
                    $temp_name = $_FILES['upload']['tmp_name'];
                    $org_name = $_FILES['upload']['name'];
                    $path = "../Assets";
                    $upload_pic = "$path/$org_name";
                    move_uploaded_file($temp_name, "$path/$org_name");
                } else {
                    $upload_pic = $prod_pic;
                }

                $psql = "UPDATE products SET
                product_name = '$updatepname',
                product_description = '$updatepdesc',
                category = '$updatecategory',
                price = '$updateprice',
                product_pic = '$upload_pic' WHERE product_id = $id";



                $q = mysqli_query($conn, $psql);

                if (!$q) {
                    echo "<div class='alert alert-danger text-center' role='alert'>
                        Invalid Input!
                      </div>";
                } else {
                    echo "<div class='alert alert-success text-center' role='alert'>
                        Updated!
                      </div>";
                }
            }
            ?>


            <div class="btn-group">
                <a class="btn btn-secondary" style="border-radius: 25px; width:120px;" onclick="goBack()">Your Home Page</a>
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

<script>
function goBack() {
    window.history.back();
}
</script>