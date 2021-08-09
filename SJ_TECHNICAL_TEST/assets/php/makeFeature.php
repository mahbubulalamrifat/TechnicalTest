<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

include "includes/db_connect.inc.php";

$id = $_GET['id'];
$feature = 'feature';
$enable = 'enable';
$query = "SELECT status FROM events WHERE id = '$id' AND status = '$enable';";
echo $query;
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 0) {
    header("Location: ../../dashboard.php?error=Event is Disable, To make Feature Enable at first");
} else {
    $del = mysqli_query(
        $conn,
        "update events set feature='$feature' where id='$id'"
    );
}


if ($del) {
    mysqli_close($conn);
    header("Location: ../../dashboard.php?success=Feature Added Successfully");
    exit;
} else {
    header("Location: ../../dashboard.php?error=Event is Disable, To make Feature Enable at first");
}
