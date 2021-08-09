<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin.php");
}

if (isset($_POST['addEvent'])) {
    include "includes/db_connect.inc.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $eventName = validate($_POST['eventName']);
    $date = validate($_POST['date']);
    $category = validate($_POST['category']);
    $description = validate($_POST['description']);
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $status = validate($_POST['status']);


    $sql = "INSERT INTO events (name, date, category, description, image, status) VALUES ('$eventName','$date','$category','$description','$file','$status');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../events.php?success=Successfully Created");
    } else {
        header("Location: ../../events.php?error=Something Went Wrong");
    }
}
