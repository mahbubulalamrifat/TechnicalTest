<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

include "includes/db_connect.inc.php";

$id = $_GET['id'];

$del = mysqli_query($conn, "delete from events where id = '$id'");

if ($del) {
    mysqli_close($conn);
    header("Location: ../../dashboard.php?success=Successfully Deleted");
    exit;
} else {
    header("Location: ../../dashboard.php?error=Something Went Wrong");
}
