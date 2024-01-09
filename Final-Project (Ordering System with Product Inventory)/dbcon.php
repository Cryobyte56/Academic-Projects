<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "project_accounts";

$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    error_log("Database connection error: " . mysqli_connect_error());
    die("Something Went Wrong");
}
