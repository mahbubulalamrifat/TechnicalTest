<?php

if (isset($_POST['create'])) {
    include "includes/db_connect.inc.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $psw = validate($_POST['psw']);
    $pswNew = password_hash($psw, PASSWORD_BCRYPT);

    $sqlUserCheck = "SELECT username FROM createadmin WHERE username = '$username';";
    $result = mysqli_query($conn, $sqlUserCheck);
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../../create.php?error=User already exist");
    } else if ((empty($psw))) {
        header("Location: ../../create.php?error=Password is required&");
    } else if (empty($username)) {
        header("Location: ../../create.php?error=Username is required&");
    } else {
        $sql = "INSERT INTO createadmin(username, password) 
               VALUES('$username', '$pswNew')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../../admin.php?success=Successfully Created");
        } else {
            header("Location: ../../create.php?error=Something Went Wrong");
        }
    }
}
