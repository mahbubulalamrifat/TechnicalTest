<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

include "includes/db_connect.inc.php";

$id = $_GET['id'];
$feature = '';
$del = mysqli_query(
    $conn,
    "update events set feature='$feature' where id='$id'"
);

if ($del) {
    mysqli_close($conn);
    header("Location: ../../dashboard.php?success=Feature Removed Successfully");
    exit;
} else {
    header("Location: ../../dashboard.php?error=Something Went Wrong");
}
