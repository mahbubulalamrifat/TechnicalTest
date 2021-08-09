<?php

if (isset($_POST['createCategory'])) {
    include "includes/db_connect.inc.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $newcategory = validate($_POST['newcategory']);
    $query = "SELECT category FROM category WHERE category = '$newcategory';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../../dashboard.php?error=Data Already Exist");
    } else {
        $sql = "INSERT INTO category(category) VALUES ('$newcategory') ";

        $res = mysqli_query($conn, $sql);
    }


    if ($res) {
        header("Location: ../../dashboard.php?success=successfully created");
    } else {
        header("Location: ../../dashboard.php?error=Data Already Exist");
    }
}
